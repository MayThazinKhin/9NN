<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Primary;
use Illuminate\Http\Request;

class FinancialController extends Controller
{
    public function index(){
        $primaries = Primary::paginate(20);
        return view('financial.index',compact('primaries'));
    }
}
