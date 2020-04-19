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
        'room',
    ];

    public function senders()
    {
        return $this->belongsToMany(User::class, 'messages', 'request_id', 'sender_id')
            ->withPivot('request_id', 'sender_id', 'content', 'file', 'created_at');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
