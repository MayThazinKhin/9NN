<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Marker extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $fillable = ['name','password','fee'];

    protected $hidden = ['password'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
