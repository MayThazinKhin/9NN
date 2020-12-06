<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemReceipt extends Pivot
{
    protected $table = 'item_receipt';
    protected $fillable = ['receipt','item_id','count'];
}
