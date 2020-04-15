<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentTutor extends Model
{
    protected $table = 'student_tutor';

    protected $fillable = [
        'student_id',
        'tutor_id',
    ];
}
