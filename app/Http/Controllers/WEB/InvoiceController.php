<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\SessionAdding;
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
        $session =  SessionFacade::checkout($request->all());
        (new SessionAdding($session))->run();
        return response()->json(array('is_success' => true) , 200);
    }

    public function getCredits(){
        //$invoices  = SessionFacade::credits();
        $members = Member::where('credit','<>',0)->get();
        return view('credit.index',compact('members'));
    }

    public function payCredit(Request $request){
        //SessionFacade::pay($request->all());
        $member = Member::where('id',$request['member_id'])->first();
        $member->credit -= $request['paid_credit'];
        $member->update();
        return redirect()->back();
    }
}
