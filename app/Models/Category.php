<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','type_id'];

    protected $hidden = ['created_at','updated_at'];

    public function items(){
        return $this->hasMany(Item::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


}
