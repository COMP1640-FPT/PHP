<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
    ];

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function classes()
    {
        return $this->hasMany(Klass::class);
    }
}
