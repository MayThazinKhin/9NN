<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name','password','role_id'];
    protected $appends = ['role'];
    protected $hidden = ['password'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function role()
    {
       return $this->belongsTo(Role::class);
    }

    public function getRoleAttribute()
    {
        return $this->role()->where('id',$this->role_id)->pluck('name')->first();
    }
}
