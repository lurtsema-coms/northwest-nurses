<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:database-backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->backUpDatabase();
        $this->deleteOldBackUps();
    }

    public function backUpDatabase()
    {
        $ds = DIRECTORY_SEPARATOR;

        $host = env('DB_HOST');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD', '');
        $database = env('DB_DATABASE');

        $ts = time();

        $path = storage_path() . $ds . 'backups' . $ds . date('Y', $ts) . $ds . date('m', $ts) . $ds . date('d', $ts) . $ds;
        $file = date('Y-m-d-His', $ts) . '-dump-' . $database . '.sql';
        $command = "mysqldump -h $host -u $username -p $database > $path$ds$file --password='$password' --skip-comments --skip-add-locks";

        if (!is_dir($path)) {
            mkdir($path, 0755, true);
        }

        exec($command);
    }

    public function deleteOldBackUps()
    {
        $oldBackupDate = now()->subDays(30);
        $oldBackupPath = storage_path('backups/' . $oldBackupDate->format('Y/m/d'));

        if (File::exists($oldBackupPath)) {
            File::deleteDirectory($oldBackupPath);
            $this->info('Old backup files deleted successfully.');
        } else {
            $this->info('No old backup files found.');
        }
    }
}
