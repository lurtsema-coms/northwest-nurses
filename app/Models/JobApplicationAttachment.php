<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicationAttachment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function resume() {
        return $this->belongsTo(Resume::class);
    }
}
