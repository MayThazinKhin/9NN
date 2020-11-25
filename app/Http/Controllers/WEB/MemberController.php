<?php

namespace App\Http\Controllers\WEB;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends BasicController
{
    public function __construct(){
        $members = Member::class;
        parent::__construct( $members,'member','members');
    }

    public function index(){
        return  parent::indexData(null,[]);
    }

    public function create(){
    }


    public function store(Request $request){
        //
    }

    public function show($id){
        //
    }


    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }

    public function search(Request $request){
        $query = $request->all()['query'];
        $members = Member::where('name', 'LIKE', "%{$query}%")->get();
        return view('member.search',compact('members'));
    }
}
