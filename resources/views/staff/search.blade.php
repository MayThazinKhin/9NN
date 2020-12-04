@extends('layouts.master')
@section('content_title', 'Staff Management')

@section('add','#add')
{{--@include('staff.create')--}}
{{--@include('staff.edit')--}}
@include('layouts.delete')

@section('content')
    <form action=" {{route('staffs.search')}} " id="staff_search" method="post">
        @csrf
        <label class="search-box-container">
            <input type="text" id="search_input" name="query" class="search-box py-1 " id="myInput" placeholder=" Search..." autocomplete="off">
            <i class="fal fa-search search-icon"></i>
        </label>
    </form>
    <div class="d-inline-block ml-3">
        <button type="button" class="btn btn-info py-1 px-5 rounded-0"  data-toggle="modal" data-target=@yield('add')>Add</button>
    </div>
    <div>
        <form class="position-relative w-100 h-100 bg-white p-3 mt-3">
            <table class="table table-borderless" id="myTable">
                <thead>
                <tr class="" style="border-bottom: 2px solid #dee2e6">
                    <th class="table-header font-weight-normal">Id</th>
                    <th class="table-header font-weight-normal">Name</th>
                    <th class="table-header font-weight-normal">Role</th>
                    <th class="table-header font-weight-normal"> &nbsp;</th>
                </tr>
                </thead>
                <tbody>

                @foreach($staffs as $i=>$staff)
                    <tr>
                        <th scope="row" class="padding-table-row">
                    <span class="text-td font-weight-normal">
                        {{$staff->id}}
{{--                        {{ $staffs->perPage()*($staffs->currentPage()-1)+ (++$i) }}--}}
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

                        <td class="padding-table-row w88px">
                            <edit-button entity="{{$staff}}"></edit-button>


                            <button type="button" onclick="deleteItem('staffs',{{$staff->id}})" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                                <a href="#"
                                > <i class="fal fa-times text-danger fw300"></i></a>
                            </button >
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </form>
    </div>
    @php
        $input1 = (object) ["type" => "text", "label" => "Name", "name" => "name"];
        $input2 = (object) ["type" => "password", "label" => "Password", "name" => "password"];
        $input3 = (object) ["type" => "select", "label" => "Role", "name" => "role_id", "data" => $roles];
        $input4 = (object) ["type" => "text", "label" => "Fee Per Min", "name" => "fee"];
        $inputs = array($input1,$input2,$input3,$input4);
    @endphp

    <add-modal title="Add New Staff" :inputs="{{json_encode($inputs)}}" url="/staffs"></add-modal>
    <edit-modal title="Edit Staff" :inputs="{{json_encode($inputs)}}" url="/staffs"></edit-modal>



    <script type="application/javascript">
        $('#search_input').keydown(function(event){
            let keyCode = (event.keyCode ? event.keyCode : event.which);
            if (keyCode == 13) {
                if(!($('#search_input').val() === '')) $('form#staff_search').submit();
            }
        });
    </script>
@endsection
