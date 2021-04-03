<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;
    protected $fillable = [
        'total','net_value','paid_value',
        'tax','change', 'discount','credit',
        'is_tax','is_done',
        'marker_id','cashier_id','member_id'];

    public function items(){
        return $this->belongsToMany(Item::class,'item_receipt')
            ->withPivot('count');
    }
}
