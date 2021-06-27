<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $input['name'] = $request->name;
        $input['password'] = $request->password;
        if (!Auth::attempt($input))
            return redirect('login');
        if (Gate::allows('isAdmin'))
            return redirect('staffs');
        elseif(Gate::allows('isCashier'))
            return redirect('invoices');
        elseif(Gate::allows('isKitchenStaff'))
            return redirect('kitchen_items');
        elseif(Gate::allows('isInventoryStaff'))
            return redirect('item_list');
        else
            return redirect('login');
    }

    public function logout(){
        Auth('web')->logout();
        return view('login');
    }
}
