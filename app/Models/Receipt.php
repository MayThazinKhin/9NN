<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = ['total','marker_id','admin_id'];

    public function items(){
        return $this->belongsToMany(Item::class,'item_receipt')
            ->withPivot('count');
    }
}
