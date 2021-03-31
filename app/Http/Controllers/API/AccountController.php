<?php

namespace App\Http\Controllers\API;

use App\Http\Actions\Account\SessionAdding;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function run(){
      return   (new SessionAdding(1))->run();
    }
}
