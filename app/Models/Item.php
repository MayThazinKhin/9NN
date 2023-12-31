<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','count','category_id','buying_price'];

    protected $appends = ['category_name'];

    protected $hidden = ['created_at','updated_at'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getCategoryNameAttribute(){
        return $this->category()->where('id',$this->category_id)->pluck('name')->first();
    }

    public function type(){
        return $this->category->type();
    }

    public function itemInventories(){
        return $this->hasMany(ItemInventory::class);
    }





}
