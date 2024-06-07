<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class JobPosting extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getActiveJobPostings()
    {
        return self::query()
            ->whereNull('deleted_at')
            ->where('status', 'ACTIVE')
            ->where('openings', '>', 0);
    }

    public function getRecentJobPostings()
    {
        return self::query()
            ->orderBy('created_at', 'desc')
            ->whereNull('deleted_at')
            ->where('status', 'ACTIVE')
            ->where('openings', '>', 0)
            ->take(6)
            ->get();
    }

    public function getApplicantsPost()
    {
        return $this->hasMany(JobApplication::class);
    }

}
