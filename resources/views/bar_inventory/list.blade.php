@extends('layouts.master')
@section('content_title', 'Inventory Management')
@section('bar_inventory','active-link')
@section('content_header')
@endsection
@section('content')
        <header class="header pl-2">
            <div class="d-flex justify-content-between">
                <nav style="margin-top: 8px">
                    <a href="#" class="a-clear text-dark fm-roboto fs17">Inventory Management </a>
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
                        <th class="table-header font-weight-normal">Item</th>
                        <th class="table-header font-weight-normal">Count</th>
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
                                   {{$item->item_name}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$item->count}}
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </form>
    </div>
        @endforeach
@endsection
