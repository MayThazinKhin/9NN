<?php

//use in SessionAdding
namespace App\Http\Actions\Account;

class StaffAdding extends Ledgering
{
   private $staff_id;
   public function __construct($staff_id){
        parent::__construct();
        $this->staff_id = $staff_id;
        $type = $this->setType($staff_id,'staff');
        $this->ledger = array_merge($this->ledger,$type);
   }
   public function addMarkerFeeValue($fee_paid,$total_min){
        $marker_fee_value = $fee_paid * $total_min ;
        $data = $this->setData($marker_fee_value,1107);
        $this->create($data);
    }
}
