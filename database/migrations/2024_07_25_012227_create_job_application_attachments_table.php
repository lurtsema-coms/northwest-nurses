<?php

use App\Models\JobApplication;
use App\Models\RequiredAttachment;
use App\Models\Resume;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_application_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JobApplication::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(RequiredAttachment::class)->nullable()->constrained()->onDelete('cascade');
            $table->foreignIdFor(Resume::class)->constrained();
            $table->text('file_names')->nullable();
            $table->text('file_paths')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application_attachments');
    }
};
