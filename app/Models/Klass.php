<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klass extends Model
{
    protected $fillable = [
        'subject_id',
        'code',
        'link',
        'status',
        'start_date',
        'end_date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'class_user');
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
