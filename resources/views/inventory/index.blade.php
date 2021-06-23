@extends('layouts.master')
@section('content_title', 'Inventory History')
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
                <th class="table-header font-weight-normal">Date</th>
                <th class="table-header font-weight-normal">Item</th>
                <th class="table-header font-weight-normal">Count</th>
                <th class="table-header font-weight-normal">Price</th>
            </tr>
            </thead>
            <tbody>

            @foreach($inventories as $i=>$inventory)
            <tr>
                <th scope="row" class="padding-table-row">
                    <span class="text-td font-weight-normal">
                        {{ $inventories->perPage()*($inventories->currentPage()-1)+ (++$i) }}
                    </span>
                </th>
                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$inventory->date}}
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$inventory->item_name}}
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$inventory->count}}
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$inventory->price}}
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$inventories->links()}}
            </nav>
    </form>
    </div>

@endsection
