<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($model) {
            if ($model->isDirty('status')) {
                $model->appendStatus($model->status);
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'created_by');
    }

    public function getApplicantsInformation()
    {
        return $this->belongsTo(User::class, 'created_by')
            ->leftJoin('applicant_details', 'users.id', '=', 'applicant_details.user_id')
            ->select('users.*', 'applicant_details.first_name', 'applicant_details.last_name', 'applicant_details.sex', 'applicant_details.birthdate');
    }

    public function jobApplicationAttachments()
    {
        return $this->hasMany(JobApplicationAttachment::class, 'job_application_id');
    }

    public function appendStatus($status)
    {
        $status_history = json_decode($this->status_history, true);
        if (is_string($status_history)) {
            $status_history = json_decode($status_history, true);
        }
        $status_history[] = [date('Y-m-d H:i:s') => $status];
        $this->status_history = json_encode($status_history);
    }

    public function details()
    {
        return $this->belongsTo(JobPosting::class, 'job_posting_id', 'id');
    }
}
