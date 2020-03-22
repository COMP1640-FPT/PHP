<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'code',
        'role',
        'country',
        'address',
        'gender',
        'phone',
        'birthday',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function classes()
    {
        return $this->belongsToMany(Klass::class, 'class_user');
    }
}
