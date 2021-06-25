<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemInventory extends Model
{
    protected $table = 'item_inventory';
    protected $fillable = ['item_id','type_id','count'];
    protected $appends = ['item_name'];
    public $timestamps = false;

    public function item(){
        return $this->belongsTo(Item::class);
    }

    public function getItemNameAttribute(){
        return $this->item()->where('id',$this->item_id)->pluck('name')->first();
    }

}
