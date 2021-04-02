<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['value','date','account_id','ledgerable_id','ledgerable_type'];

    protected $appends = ['title','type'];

    public function ledgerable(){
        return $this->morphTo();
    }

    public function account(){
      return  $this->belongsTo(Account::class);
    }

    public function getTitleAttribute(){
        return $this->account()->where('id',$this->account_id)->pluck('id')->first();
    }

    public function getTypeAttribute(){
        $code = $this->account()->where('id',$this->account_id)->pluck('code')->first();
        $type_id = intval(substr($code, 0, 1));
        return Account::where('code',$type_id)->pluck('id')->first();
    }

    public function getTitleNameAttribute(){
        return $this->account()->where('id',$this->account_id)->pluck('name')->first();
    }

    public function getTypeNameAttribute(){
        $code = $this->account()->where('id',$this->account_id)->pluck('code')->first();
        $type_id = intval(substr($code, 0, 1));
        return Account::where('code',$type_id)->pluck('name')->first();
    }




}
