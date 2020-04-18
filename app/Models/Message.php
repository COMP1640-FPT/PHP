<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'request_id',
        'sender_id',
        'content',
        'file',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function sender()
    {
        return $this->belongsTo(User::class);
    }
}
