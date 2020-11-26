<?php

namespace App\Http\Controllers\WEB;

use App\Http\Requests\Web\MemberCreateRequest;
use App\Http\Requests\Web\MemberUpdateRequest;
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

    public function store(MemberCreateRequest $request){
        return parent::storeData($request);
    }

    public function update(MemberUpdateRequest $request, Member $member){
        return parent::updateData($request, $member);
    }

    public function destroy(Member $member){
        return parent::destroyData($member);
    }

    public function search(Request $request){
        return parent::searchData($request);
    }
    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function create(){
        //
    }


}
