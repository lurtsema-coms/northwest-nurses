<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Resume extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    protected $fillable = [
        'user_id', 'default', 'file_path', 'created_by', 'created_at',
    ];
}
