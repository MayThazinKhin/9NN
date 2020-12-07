@extends('layouts.master')
@section('content_title', 'Cancel Items')
@section('cancel','active-link')
@section('content')
    <div>
        <form class="position-relative w-100">
            <div class="w-100 bg-white p-3 mt-3" style="min-height: 76vh">
            <table class="table table-borderless" id="myTable">
                <thead>
                <tr class="" style="border-bottom: 2px solid #dee2e6">
                    <th class="table-header font-weight-normal">Id</th>
                    <th class="table-header font-weight-normal">Date</th>
                    <th class="table-header font-weight-normal">Marker Name</th>
                    <th class="table-header font-weight-normal">Item Name</th>
                    <th class="table-header font-weight-normal">Count</th>
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
                                {{$item->created_at}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$item->marker_name}}
                            </div>
                        </td>

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
                @endforeach
                </tbody>

            </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$items->links()}}
            </nav>
        </form>
    </div>

@endsection

