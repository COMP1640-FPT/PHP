<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'class_id',
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    public function class()
    {
        return $belongsTo(Klass::class);
    }
}
