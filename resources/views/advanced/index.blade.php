@extends('layouts.master')
@section('content_title', 'Advanced')
@section('advance_transition','active-link')
@section('add','#add')
{{--@section('route','/items/search')--}}

{{--@include('item.create')--}}
{{--@include('item.edit')--}}
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
                        <th class="table-header font-weight-normal">Title</th>
                        <th class="table-header font-weight-normal">Type</th>
                        <th class="table-header font-weight-normal">Amount</th>
                        <th class="table-header font-weight-normal"> &nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ledgers as $i=>$ledger)
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                     {{ $ledgers->perPage()*($ledgers->currentPage()-1)+ (++$i) }}
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$ledger->title_name}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$ledger->type_name}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$ledger->value}}
                                </div>
                            </td>

                            @can('isAdmin')
                            <td class="padding-table-row w88px">

                                <button type="button" onclick="deleteItem('ledgers',{{$ledger->id}})" id="delete-button" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                                    <i class="fal fa-times text-danger fw300"></i>
                                </button>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </form>
    </div>
    @php
        $input1 = (object) ["type" => "text", "label" => "Amount", "name" => "value"];
        $input2 = (object) ["type" => "select", "label" => "Staff", "name" => "staff_id", "data" => $staffs];
        $input3 = (object) ["type" => "hidden", "label" => "Title", "name" => "title", "value" => 3101];
        $inputs = array($input1,$input2,$input3);
    @endphp

    <add-modal title="Add Advanced Transition" :inputs="{{json_encode($inputs)}}" url="/ledger_create"></add-modal>
@endsection
