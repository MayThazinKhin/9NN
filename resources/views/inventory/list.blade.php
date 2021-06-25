@extends('layouts.master')
@section('content_title', 'Inventory Management')
@section('inventory','active-link')
@section('add_route','/inventories/create')
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
                        <th class="table-header font-weight-normal">Item</th>
                        <th class="table-header font-weight-normal">Amount</th>
                        <th class="table-header font-weight-normal">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($items as $i=>$item)
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                    {{ $items->perPage()*($items->currentPage()-1)+ (++$i) }}
                                </span>
                            </th>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$item->name}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                   {{$item->count}}
                                </div>
                            </td>

                            <td class="padding-table-row w88px" style="">
                                <set-inventory-transfer-amount id="{{$item->id}}" count="{{$item->count}}"></set-inventory-transfer-amount>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$items->links()}}
            </nav>
        </form>
    </div>
    <inventory-transfer></inventory-transfer>




@endsection
