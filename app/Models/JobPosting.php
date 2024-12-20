<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobPosting extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'created_by');
    }

    public static function getActiveJobPostings()
    {
        return self::query()
            ->whereNull('job_postings.deleted_at')
            ->where('job_postings.status', 'ACTIVE')
            ->where('job_postings.openings', '>', 0);
    }

    public function getRecentJobPostings()
    {
        return self::query()
            ->orderBy('job_postings.created_at', 'desc')
            ->whereNull('job_postings.deleted_at')
            ->where('job_postings.status', 'ACTIVE')
            ->where('job_postings.openings', '>', 0)
            ->take(6)
            ->get();
    }

    public function getApplicantsPost()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function requiredAttachment()
    {
        return $this->hasOne(RequiredAttachment::class);
    }

    public function scopeApplicationInfo($query)
    {
        if (auth()->check()) {
            $query->select(
                'job_postings.*',
                'job_applications.id as job_application_id',
                'job_applications.answer_1',
                'job_applications.answer_2',
                'job_applications.answer_3',
                'job_applications.created_at as applied_date',
                'job_applications.status as application_status',
            )
                ->leftJoin('job_applications', function ($join) {
                    $join->on('job_postings.id', '=', 'job_applications.job_posting_id')
                        ->where('job_applications.created_by', auth()->user()->id);
                });
        }
        $query->leftJoin('employer_details', 'employer_details.user_id', 'job_postings.created_by')
            ->addSelect(
                'job_postings.*',
                'employer_details.name as employer_name',
            );
        return $query;
    }

    public static function countActiveJobPosting()
    {
        return self::getActiveJobPostings()->count();
    }

    public static function totalJobPost()
    {
        return self::query()
            ->withTrashed()
            ->count();
    }

    public static function totalDeletedJobPost()
    {
        return self::onlyTrashed()->count();
    }
}
