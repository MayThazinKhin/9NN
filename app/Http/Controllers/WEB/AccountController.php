<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\Accounting;
use App\Http\Actions\Account\CustomAdding;
use App\Models\Ledger;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AccountController extends BasicController
{
    private $ledger;
    public function __construct()
    {
        $this->ledger = Ledger::class;
         parent::__construct( $this->ledger,'ledger','ledger');
    }

    public function index(){
        $types =  (new Accounting())->primary();
        $cash_ids = (new Accounting())->getCashAccountID();
        $advanced_ids = (new Accounting())->getAdvancedAccountID();
        $ledgers = $this->ledger::whereNotIn('account_id',$cash_ids)->whereNotIn('account_id',$advanced_ids)
            ->orderBy('date', 'desc')->paginate(20);
        return view('daily_transition.index',compact('types','ledgers'));
    }

    public function monthly(){
        $start_date =  Carbon::now()->format('Y-m-01');
        $end_date =  Carbon::now()->format('Y-m-d');
        return $this->getAccountsWithValue($start_date,$end_date);
    }

    public function monthly_filter(Request $request){
        return $this->getAccountsWithValue($request->start_date,$request->end_date);
    }

    protected function getAccountsWithValue($start_date,$end_date){
        $accounts = (new Accounting())->getAccountValueByDate($start_date,$end_date);
        return view('monthly_transition.index',compact('accounts'));
    }


    public function type(){
        $types =  (new Accounting())->primary();
        responseData('types',$types,200);
    }

    public function title(Request $request){
        $titles =  (new Accounting())->secondary($request->type);
        return response()->json([
            'success' => true,
            'titles' => $titles
        ]);
    }

    public function create(Request $request){
        (new CustomAdding($request->all()))->run();
        if(isset($request['is_redirect'])) {
            return  redirect()->back();
        }
        return response()->json([
                'success' => true
            ]);
    }

    public function update(Request $request,Ledger $ledger){
       return parent::updateData($request,$ledger);
    }

    public function delete(Ledger $ledger){
      return  parent::destroyData($ledger);
    }




}
