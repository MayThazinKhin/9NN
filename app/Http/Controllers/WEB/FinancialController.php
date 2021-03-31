<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;

class FinancialController extends Controller
{
    public function index(){
        return view('daily_transition.index');
    }

}
