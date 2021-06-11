<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FOCItem extends Model
{
    protected $fillable = ['item_id','session_id','count'];
    protected $appends = ['item_name','item_type'];
    protected $hidden = ['pivot'] ;

    public function session(){
        return $this->belongsTo(Session::class);
    }

    public function item(){
        return $this->belongsTo(Item::class,'item_id');
    }

    public function getItemNameAttribute(){
        return $this->item()->where('id',$this->item_id)->pluck('name')->first();
    }

    public function getItemTypeAttribute(){
        return $this->item->category->type->name;
    }
}
