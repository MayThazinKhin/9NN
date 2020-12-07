@extends('layouts.master')
@section('content_title', 'Member Management')
@section('member','active-link')
@section('add','#add')
@section('route','/members/search')

{{--@include('member.create')--}}
{{--@include('member.edit')--}}
@include('layouts.delete')
@section('content_header')
    @include('layouts.content_header')
@endsection
@section('content')
    <div>
        <form class="position-relative w-100">
            <div class="w-100 bg-white p-3 mt-3" style="min-height: 76vh">
                <table class="table table-borderless" id="myTable">
                    <thead>
                    <tr class="" style="border-bottom: 2px solid #dee2e6">
                        <th class="table-header font-weight-normal">Id</th>
                        <th class="table-header font-weight-normal">Name</th>
                        <th class="table-header font-weight-normal">Phone</th>
                        <th class="table-header font-weight-normal">Allowance</th>
                        <th class="table-header font-weight-normal"> &nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($members as $i=>$member)
                    <tr>
                        <th scope="row" class="padding-table-row">
                            <span class="text-td font-weight-normal">
                                {{ $members->perPage()*($members->currentPage()-1)+ (++$i) }}
                            </span>
                        </th>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$member->name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$member->phone_number}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$member->allowance}}
                            </div>
                        </td>

                        <td class="padding-table-row w88px">
                            <edit-button entity="{{$member}}"></edit-button>

                            <button type="button" onclick="deleteItem('members',{{$member->id}})" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                                <i class="fal fa-times text-danger fw300"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$members->links()}}
            </nav>
    </form>
    </div>

    @php
        $input1 = (object) ["type" => "text", "label" => "Name", "name" => "name"];
        $input2 = (object) ["type" => "text", "label" => "Phone Number", "name" => "phone_number"];
        $input3 = (object) ["type" => "text", "label" => "Maximum Allowance", "name" => "allowance"];
        $input4 = (object) ["type" => "textarea", "label" => "Address", "name" => "address"];
        $inputs = array($input1,$input2,$input3,$input4);
    @endphp

    <add-modal title="Add New Member" :inputs="{{json_encode($inputs)}}" url="/members"></add-modal>
    <edit-modal title="Edit Member" :inputs="{{json_encode($inputs)}}" url="/members"></edit-modal>

@endsection
