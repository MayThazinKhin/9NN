<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemReceipt extends Pivot
{
    use HasFactory;
    protected $table = 'item_receipt';
    protected $fillable = ['receipt','item_id','count'];
    public $timestamps = false;
}
