<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;

use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade;
use App\Models\Member;
use Illuminate\Http\Request;

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

    public function update(Request $request){
        SessionFacade::checkout($request->all());
        return response()->json(array('is_success' => true) , 200);
    }

    public function getCredits(){
        $invoices  = SessionFacade::credits();
        return view('credit.index',compact('invoices'));
    }

    public function payCredit(Request $request){
        SessionFacade::pay($request->all());
        return response()->json(array('is_success' => true) , 200);
    }


}
