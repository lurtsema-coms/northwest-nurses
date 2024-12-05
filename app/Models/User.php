<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'contact_number',
        'address',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function applicantDetail()
    {
        return $this->hasOne(ApplicantDetail::class);
    }

    public function employerDetail()
    {
        return $this->hasOne(EmployerDetail::class);
    }

    public function jobPostings()
    {
        return $this->hasMany(JobPosting::class, 'created_by', 'id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'created_by', 'id');
    }

    public static function countApplicants()
    {
        return self::query()
            ->where('role', 'applicant')
            ->count();
    }

    public static function countEmployer()
    {
        return self::query()
            ->where('role', 'employer')
            ->count();
    }
}
