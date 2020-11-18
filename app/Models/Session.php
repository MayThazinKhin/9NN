<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['start_time','end_time','total','credit','is_tax','table_id','marker_id','admin_id','member_id'];

    public function items(){
        return $this->belongsToMany(Item::class,'item_session')->withTimestamps()->withPivot('count');
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
