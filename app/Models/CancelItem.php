<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancelItem extends Model
{
    protected $fillable = ['item_id','session_id','count'];
    protected $appends = ['item_name','item_type'];

    public function session(){
        return $this->belongsTo(Session::class);
    }

    public function cancelItem(){
        return $this->belongsTo(Item::class,'item_id');
    }

    public function getItemNameAttribute(){
        return $this->cancelItem()->where('id',$this->item_id)->pluck('name')->first();
    }

    public function getItemTypeAttribute(){
        return $this->cancelItem->category->type->name;
    }

}
