<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;

use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade;
use App\Models\Member;

class InvoiceController extends Controller
{
    public function index(){
        $invoices  = SessionFacade::uncheck();
        return view('invoice.index',compact('invoices'));
    }

    public function detail($id){
        $periods  = PeriodFacade::getPeriodsBySessionID($id);
        $items = SessionFacade::getOrderItems($id);
        $members = Member::all();
        return view('invoice.detail',compact('periods','items','members','id'));
    }
}
