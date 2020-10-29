<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemSession extends Model
{
    use HasFactory;
    protected $fillable = ['item_id','session_id','count'];
}
