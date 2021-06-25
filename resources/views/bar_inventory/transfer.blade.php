@extends('layouts.master')
@section('content_title', 'Bar Inventory Transfer Confirm')
@section('bar_inventory_confirm','active-link')
{{--@section('add_route','/inventories/create')--}}
@section('content_header')
{{--    @include('layouts.content_header')--}}
@endsection
@section('content')
    <header class="header pl-2">
        <div class="d-flex justify-content-between">
            <nav style="margin-top: 8px">
                <a href="#" class="a-clear text-dark fm-roboto fs17">Bar Inventory Transfer Confirm</a>
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
                        <th class="table-header font-weight-normal">Item Name</th>
                        <th class="table-header font-weight-normal">Amount</th>
                        <th class="table-header font-weight-normal">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $i=>$item)
                    <tr>
                        <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                    {{++$i}}
                                </span>
                        </th>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$item->date}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                               {{$item->item_name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize pl-1">
                                {{$item->count}}
                            </div>
                        </td>

                        <td class="padding-table-row w88px" style="">
                            <button type="button" onclick="setUrl({{$item->id}})" title="Transfer Item" data-toggle="modal" data-target="#transfer" class="btn-clear ">
                                <i class="fas fa-check-circle" style="color: rgb(103, 58, 183);"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </form>
    </div>





    <div class="modal fade" id="transfer" tabindex="-1" role="dialog" aria-labelledby="transfer" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
            <div class="modal-content" style="border-radius: 4px;" id="app">
                <form id="transfer_confirm" method="post">
                    @csrf
                    <div class="modal-header border-bottom-0 mt-3">
                        <div class="text-left pl-4 pt-1">
                            <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                                Confirm Transfer Item?</p>
                        </div>
                    </div>

                    <div class="modal-body mx-4 pt-0 pb-0">
                    </div>
                    <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-2">
                        <button class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">Cancel</button>
                        <button type="submit" class="btn btn-danger pl-3" style="font-size: 16px!important;"> Confirm </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="application/javascript">
        function setUrl($id) {
            $('#transfer_confirm').attr('action', '/confirm_item/'+ $id);
        }
    </script>
@endsection
