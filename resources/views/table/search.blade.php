@extends('layouts.master')
@section('content_title', 'table Management')
@section('add','#add')
{{--@include('table.create')--}}
{{--@include('table.edit')--}}
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
                    <th class="table-header font-weight-normal">Price per Min</th>
                    <th class="table-header font-weight-normal"> &nbsp;</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tables as $i=>$table)
                    <tr>
                        <th scope="row" class="padding-table-row">
                    <span class="text-td font-weight-normal">
                        {{$table->id}}
{{--                        {{ $tables->perPage()*($tables->currentPage()-1)+ (++$i) }}--}}
                    </span>
                        </th>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$table->name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$table->price}}
                            </div>
                        </td>

                        <td class="padding-table-row w88px">
                            <edit-button entity="{{$table}}"></edit-button>

                            <button type="button" onclick="deleteItem('tables',{{$table->id}})" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                                <i class="fal fa-times text-danger fw300"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </form>
    </div>

    @php
        $input1 = (object) ["type" => "text", "label" => "Name", "name" => "name"];
        $input2 = (object) ["type" => "text", "label" => "Price Per Min", "name" => "price"];
        $inputs = array($input1,$input2);
    @endphp

    <add-modal title="Add New Table" :inputs="{{json_encode($inputs)}}" url="/tables"></add-modal>
    <edit-modal title="Edit Table" :inputs="{{json_encode($inputs)}}" url="/tables"></edit-modal>


    <script type="application/javascript">
        $('#search_input').keydown(function(event){
            let keyCode = (event.keyCode ? event.keyCode : event.which);
            if (keyCode == 13) {
                if(!($('#search_input').val() === '')) $('form#staff_search').submit();
            }
        });
    </script>
@endsection
