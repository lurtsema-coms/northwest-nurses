<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getApplicantsInformation()
    {
        return $this->belongsTo(User::class, 'created_by')
        ->leftJoin('applicant_details', 'users.id', '=', 'applicant_details.user_id')
        ->select('users.*', 'applicant_details.first_name', 'applicant_details.last_name', 'applicant_details.sex', 'applicant_details.birthdate');
    }

}
