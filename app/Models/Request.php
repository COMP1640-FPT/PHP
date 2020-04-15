<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'student_id',
        'tutor_id',
        'rates',
        'type',
        'status',
        'title',
        'description',
    ];
}
