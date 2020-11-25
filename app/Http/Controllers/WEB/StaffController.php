<?php

namespace App\Http\Controllers\WEB;


use App\Http\Requests\Web\AdminCreateRequest;
use App\Models\Role;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends BasicController
{
    public function __construct(){
        $staffs = Staff::class;
        parent::__construct( $staffs,'staff','staffs');
    }

    public function index(){
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
        return parent::destroy($id);
    }


    public function search(Request $request){
        $query = $request->all()['query'];
        $roles = Role::all();

        $staffs = Staff::where('name', 'LIKE', "%{$query}%")->get();
        return view('staff.search',compact('staffs','roles'));
    }
}
