<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\Accounting;
use App\Http\Actions\Account\CustomAdding;
use App\Models\Ledger;
use Illuminate\Http\Request;

class AccountController extends BasicController
{
    private $ledgers;
    public function __construct()
    {
        $ledgers = Ledger::class;
         parent::__construct( $ledgers,'ledger','ledger');
    }

    public function index(){
        $types =  (new Accounting())->primary();
        return view('daily_transition.index',compact('types'));
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

    public function edit(Request $request,Ledger $ledger){
       return parent::updateData($request,$ledger);
    }

    public function delete(Ledger $ledger){
      return  parent::destroyData($ledger);
    }

    public function all(){
        $data = Ledger::orderBy('date', 'desc')->paginate(20);
        return $data;
    }
}
