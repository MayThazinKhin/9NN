<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class AdvanceController extends Controller
{
    public function staff(){
        $staffs = Staff::all();
        responseData('staffs',$staffs,200);
    }


}
