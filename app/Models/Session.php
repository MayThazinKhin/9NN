<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['start_time','end_time','total','credit','paid_value','discount','is_tax','table_id','marker_id','cashier_id','member_id'];

    public function items(){
        return $this->belongsToMany(Item::class,'item_session')->withTimestamps()->withPivot('count');
    }

    public function table(){
        return $this->belongsTo(Table::class);
    }

    public function marker(){
        return $this->belongsTo(Staff::class,'marker_id');
    }

    public function cashier(){
         return $this->belongsTo(Staff::class,'cashier_id');
    }
}
