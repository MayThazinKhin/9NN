<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = ['value','date','account_id','ledgerable_id','ledgerable_type'];

    public function ledgerable(){
        return $this->morphTo();
    }
}
