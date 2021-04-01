<?php


namespace App\Http\Actions\Account;

use App\Http\Services\Period\PeriodFacade;
use App\Http\Services\Session\SessionFacade;

class SessionAdding extends Ledgering
{
    private $sessionId;
    private $sessionPeriods;
    private $marker ;
    public function __construct($sessionID){
        parent::__construct();
        $this->sessionId = $sessionID;
        $this->sessionPeriods =  PeriodFacade::getPeriodsBySessionID($sessionID);
        $this->marker = SessionFacade::getMarker($this->sessionId);
        $type = $this->setType($this->sessionId,'session');
        $this->ledger = array_merge($this->ledger,$type);

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
}
