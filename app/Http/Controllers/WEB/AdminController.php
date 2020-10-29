<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AdminCreateRequest;
use App\Models\Admin;
use App\Models\Item;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AdminController extends BasicController
{
    public function __construct()
    {
        $admin = Admin::class;
        parent::__construct( $admin,'admin','admins');
    }

    public function index()
    {
        $roles = Role::all();
        $extra_data  = ['roles'=>$roles];
        return  parent::indexData(null,$extra_data);
    }

    public function create()
    {
        //
    }


    public function store(AdminCreateRequest $request)
    {
        //return $request->all();
        return parent::storeData($request);
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
