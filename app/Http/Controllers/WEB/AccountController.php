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
        $ledgers = $this->ledger::orderBy('date', 'desc')->paginate(20);
        return view('daily_transition.index',compact('types','ledgers'));
    }

    public function monthly(){
        $start_date =  Carbon::now()->format('Y-01-m');
        $end_date =  Carbon::now()->format('Y-d-m');
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
        return response()->json([
                'success' => true
            ]);
    }

    public function update(Request $request,Ledger $ledger){
        //dd($request->all());
       return parent::updateData($request,$ledger);
    }

    public function delete(Ledger $ledger){
      return  parent::destroyData($ledger);
    }

    public function monthly_filter(Request $request)
    {
        dd($request->all());
    }


}
