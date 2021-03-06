<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
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
        'avatar',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function tutors()
    {
        return $this->belongsToMany($this, 'student_tutor', 'student_id', 'tutor_id');
    }

    public function students()
    {
        return $this->belongsToMany($this, 'student_tutor', 'tutor_id', 'student_id');
    }

    public function rTutors()
    {
        return $this->belongsToMany($this, 'requests', 'student_id', 'tutor_id')
            ->withPivot('title', 'rates', 'type', 'status');
    }

    public function rStudents()
    {
        return $this->belongsToMany($this, 'requests', 'tutor_id', 'student_id')
            ->withPivot('title', 'rates', 'type', 'status');
    }

    public function requests()
    {
        return $this->belongsToMany(Request::class, 'messages', 'sender_id', 'request_id')
            ->withPivot('request_id', 'sender_id', 'content', 'file', 'created_at');
    }
}
