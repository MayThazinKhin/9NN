<?php

namespace App\Http\Controllers\WEB;

use App\Http\Actions\Account\Accounting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
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
        responseData('titles',$titles,200);
    }
}
