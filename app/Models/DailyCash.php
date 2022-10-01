<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DailyCash extends Model
{
     protected $fillable = ['date','opening','closing','account_id'];
}
