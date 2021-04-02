<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Ledger;

class AccountController extends Controller
{
    public function run(){
        $ledgers = Ledger::orderBy('date', 'desc')->paginate(20);
        return $ledgers;
    }
}
