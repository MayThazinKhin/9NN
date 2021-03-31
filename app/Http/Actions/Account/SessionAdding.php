<?php


namespace App\Http\Actions\Account;

use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade;
use App\Models\Account;
use App\Models\Ledger;

class SessionAdding
{
    private $sessionId;
    private $sessionPeriods;
    private $ledger ;
    private $marker ;
    public function __construct($sessionID){
        $this->sessionId = $sessionID;
        $this->sessionPeriods =  PeriodFacade::getPeriodsBySessionID($sessionID);
        $this->marker = SessionFacade::getMarker($this->sessionId);
        $this->ledger = [
            'date' =>now(),
            'ledgerable_id' => $this->sessionId,
            'ledgerable_type' => 'session'
        ];

    }

    public function run(){
        $this->addTableValue();
        $this->addMarkerValue();
        $this->addFoodValue();
        $this->addTaxValue();
        $this->addMarkerFeeValue();
    }

    protected function addTableValue(){
        $session_value  = $this->sessionPeriods->total_value ;
        $data = $this->setData($session_value,1101);
        $this->create($data);
    }

    public function addMarkerValue(){
        $marker_paid_value  = $this->sessionPeriods->total_min * $this->marker->fee;
        $data = $this->setData($marker_paid_value,1102);
        $this->create($data);
    }

    protected function addFoodValue(){
        $food_value =  (SessionFacade::getOrderItems($this->sessionId))->net_total;
        if($food_value > 0){
            $data = $this->setData($food_value,1103);
            $this->create($data);
        }
    }

    protected function addTaxValue(){
        $tax_value = SessionFacade::getTaxValue($this->sessionId);
        if($tax_value > 0){
            $data = $this->setData($tax_value,1105);
            $this->create($data);
        }
    }

    protected function addMarkerFeeValue(){
        $marker_fee_value = $this->marker->fee_paid;
        $data = $this->setData($marker_fee_value,1107);
        $this->create($data);
    }

    protected function create($data){
        $ledger_data = array_merge($this->ledger,$data);
        Ledger::create($ledger_data);
    }

    protected function setData($value, $code){
        $account_id = Account::where('code',$code)->pluck('id')->first();
        return [
            'value' => $value,
            'account_id'=> $account_id
        ];
    }


}
