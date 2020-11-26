<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = ['count','price','item_id','date'];
    protected $appends = ['item_name'];

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function getItemNameAttribute(){
        return $this->item()->where('id',$this->item_id)->pluck('name')->first();
    }
}
