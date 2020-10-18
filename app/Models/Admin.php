<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name','password','role_id'];

    protected $hidden = ['password'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
