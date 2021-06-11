@extends('layouts.master')
@section('content_title', 'Bar Inventory Management')
@section('bar_inventory','active-link')
{{--@section('add_route','/inventories/create')--}}
@section('content_header')
{{--    @include('layouts.content_header')--}}
@endsection
@section('content')
        <header class="header pl-2">
            <div class="d-flex justify-content-between">
                <nav style="margin-top: 8px">
                    <a href="#" class="a-clear text-dark fm-roboto fs17">Bar Inventory Management </a>
                </nav>
            </div>
        </header>
    <div>
        <form class="position-relative w-100">
            <div class="w-100 bg-white p-3 mt-3" style="min-height: 76vh">
                <table class="table table-borderless" id="myTable">
                    <thead>
                    <tr class="" style="border-bottom: 2px solid #dee2e6">
                        <th class="table-header font-weight-normal">Id</th>
                        <th class="table-header font-weight-normal">Date</th>
                        <th class="table-header font-weight-normal">Item</th>
                        <th class="table-header font-weight-normal">Count</th>
{{--                        <th class="table-header font-weight-normal">&nbsp;</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                    1
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    12.12.2021
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    something
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    3
                                </div>
                            </td>


{{--                            <td class="padding-table-row w88px" style="">--}}
{{--                                <button type="button" title="Transfer Item" data-toggle="modal" data-target="#transfer" class="btn-clear ">--}}
{{--                                    <i class="fas fa-exchange-alt" style="color: rgb(103, 58, 183);"></i>--}}
{{--                                </button>--}}
{{--                            </td>--}}
                        </tr>
                    </tbody>

                </table>
            </div>
{{--            <nav aria-label="Page navigation example">--}}
{{--                {{$inventories->links()}}--}}
{{--            </nav>--}}
        </form>
    </div>

    {{--    @php--}}
    {{--        $input1 = (object) ["type" => "text", "label" => "Amount", "name" => "amount"];--}}
    {{--        $input2 = (object) ["type" => "select", "label" => "To", "name" => "to", "data" =>"" ];--}}
    {{--        $inputs = array($input1,$input2);--}}
    {{--    @endphp--}}

    {{--    <add-modal title="Add New Admin" :inputs="{{json_encode($inputs)}}" url="/admin"></add-modal>--}}
    {{--    <edit-modal title="Transfer Item" :inputs="{{json_encode($inputs)}}" url="/admin"></edit-modal>--}}




    <div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="transfer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
            <div class="modal-content" style="border-radius: 4px;" id="app">
                <form id="add_form" action="#"  method="post">
                    <div class="modal-header border-bottom-0 mt-3">
                        <div class="text-left pl-4 pt-1">
                            <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                                Transfer Item</p>
                        </div>
                    </div>

                    <div class="modal-body mx-4 pt-2 pb-0">
                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;">Amount</label>
                            <input type="text" class="input-form" placeholder="Amount" style="font-size: 14px!important;">

                        </div>

                        <div class="mb-4">
                            <label class="label-form mb-1" style="font-size: 15px!important;color: #1b1e21">To</label>
                            <select class="selectpicker d-block" data-width="100%" title="Choice..."
                                    data-style="select-form w-100"
                            >
                                <option value="bar">Bar</option>
                                <option value="shop">Shop</option>
                                <option value="kitchen">Kitchen</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                        <button class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">Cancel</button>
                        <button class="btn btn-danger pl-3" style="font-size: 16px!important;"> Confirm </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
