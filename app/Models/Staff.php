<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Staff extends Authenticatable implements JWTSubject
{
    use HasFactory;
    protected $fillable = ['name','password','role_id','fee','fee_paid'];
    protected $appends = ['role','monthly_fee'];
    protected $hidden = ['password'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function ledgers(){
        return $this->morphMany(Ledger::class,'ledgerable');
    }

    public function getRoleAttribute(){
        return $this->role()->where('id',$this->role_id)->pluck('name')->first();
    }

    public function getMonthlyFeeAttribute(){
        $date =  Carbon::now()->format('01-m-Y');
        return $this->ledgers()->sum('value');
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
