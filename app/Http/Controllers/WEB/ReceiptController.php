<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Session\OrderedItems;
use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Receipt;
use Illuminate\Http\Request;

class ReceiptController extends Controller
{
    private $receipt;

    public function __construct(){
        $this->receipt = Receipt::class;
    }

    public function index(){
        $receipts = $this->receipt::where('admin_id', null)->orderBy('id', 'desc')->paginate(20);
        return view('shop_invoice.index',compact('receipts'));
    }

    public function detail($id){
        $receipt = (new OrderedItems())->run($this->checkReceiptID($id));
        $members = Member::all();
        return view('shop_invoice.detail',compact('receipt','members'));
    }

    public function checkReceiptID($id){
        $receipt = $this->receipt::where('id', $id)->first();
        if (!$receipt)
            responseStatus('Requested receipt ID is not found', 400);
        return $receipt;
    }

    public function update(){

    }
}
