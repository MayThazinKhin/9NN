@extends('layouts.master')
@section('content_title', 'Bank Book')
@section('bank_book','active-link')
@section('add','#add')
@section('route','/closing')
@include('layouts.delete')
@section('content_header')
    <div class="d-flex justify-content-between">
        <nav style="margin-top: 8px">
            <a href="#" class="a-clear text-dark fm-roboto fs17">@yield('content_title') </a>
        </nav>
        <div>

            @yield('select_box')
            <div class="d-inline-block ml-3">
                @hasSection('route')
                    <a class="btn btn-danger py-1 px-5 rounded-0" href=@yield('route')/31>Close</a>
                @else
                    <button type="button" class="btn btn-danger py-1 px-5 rounded-0"  data-toggle="modal" data-target=@yield('add')>
                        Close
                    </button>
                @endif
            </div>
        </div>
    </div>
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
                        <th class="table-header font-weight-normal">Remark</th>
                        <th class="table-header font-weight-normal">Opening</th>
                        <th class="table-header font-weight-normal">Balance</th>
                        <th class="table-header font-weight-normal"> &nbsp;</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$opening}}
                            </div>
                        </td>
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

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$ledger->remark}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$ledger->balance}}
                                </div>
                            </td>

                            @can('isAdmin')
                                <td class="padding-table-row w88px">
                                    <edit-button entity="{{$ledger}}"></edit-button>

                                    <button type="button" onclick="deleteItem('ledgers',{{$ledger->id}})" id="delete-button" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                                        <i class="fal fa-times text-danger fw300"></i>
                                    </button>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                    <tr style="border-top: 2px solid #dee2e6">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                @isset($ledger)
                                    {{$ledger->balance}}
                                @endisset
                            </div>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$ledgers->links()}}
            </nav>
        </form>
    </div>
    @php
        $input1 = (object) ["type" => "text", "label" => "Amount", "name" => "value"];
        $edit_inputs = array($input1);
    @endphp

    <edit-modal title="Edit Cash Book" :inputs="{{json_encode($edit_inputs)}}" url="/ledger_update"></edit-modal>
@endsection
