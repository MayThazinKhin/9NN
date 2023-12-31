@extends('layouts.master')
@section('content_title', 'Staff Management')
@section('staff','active-link')
@section('add','#add')
@section('route','/staffs/search')

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
                        <th class="table-header font-weight-normal">Role</th>
                        <th class="table-header font-weight-normal">Monthly Fee</th>
                        <th class="table-header font-weight-normal"> Actions</th>
{{--                        <th class="table-header font-weight-normal"> &nbsp;</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($staffs as $i=>$staff)
                    <tr>
                        <th scope="row" class="padding-table-row">
                            <span class="text-td font-weight-normal">
                                {{ $staffs->perPage()*($staffs->currentPage()-1)+ (++$i) }}
                            </span>
                        </th>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$staff->name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$staff->role}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$staff->monthly_fee}}
                            </div>
                        </td>

                        <td class="padding-table-row w120px" style="">
                            <edit-staff-button entity="{{$staff}}"></edit-staff-button>
                            <button type="button" onclick="deleteItem('staffs',{{$staff->id}})" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                                <i class="fal fa-times text-danger fw300"></i>
                            </button >
                            <edit-password-button entity="{{$staff}}"></edit-password-button>

                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$staffs->links()}}
            </nav>
    </form>
    </div>

    <add-new-staff :roles="{{json_encode($roles)}}" ></add-new-staff>
    <edit-staff :roles="{{json_encode($roles)}}"></edit-staff>
    @php
        $input1 = (object) ["type" => "password", "label" => "Password", "name" => "password"];
        $input2 = (object) ["type" => "password", "label" => "Password Confirmation ", "name" => "password_confirmation"];
        $change_inputs =  array($input1,$input2);
    @endphp

    <edit-password title="Change Password" :inputs="{{json_encode($change_inputs)}}" url="/staffs/change_password"></edit-password>
@endsection
