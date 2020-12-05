@extends('layouts.master')
@section('content_title', 'Cancel Items')
@section('kitchen','active-link')
@section('content')
    <div>
        <form class="position-relative w-100 h-100 bg-white p-3 mt-3">
            <table class="table table-borderless" id="myTable">
                <thead>
                <tr class="" style="border-bottom: 2px solid #dee2e6">
                    <th class="table-header font-weight-normal">Id</th>
                    <th class="table-header font-weight-normal">Date</th>
                    <th class="table-header font-weight-normal">Item Name</th>
                    <th class="table-header font-weight-normal">Count</th>
                    <th class="table-header font-weight-normal">Status</th>
                    <th class="table-header font-weight-normal"> &nbsp;</th>
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
                                {{$item->item_name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$item->count}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$item->status}}
                            </div>
                        </td>

                        <td class="padding-table-row w88px">
{{--                            <button type="button" class="btn-clear " title="Edit"  id="edit-button">--}}
{{--                                <a class="a-clear" href="{{route('update_kitchen_status',['item' => $item->id])}}">--}}
{{--                                    <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>--}}
{{--                                </a>--}}
{{--                            </button>--}}
                            <button class="border-0 bg-white" data-toggle="modal" data-target="#order_status" title="Change Status"
                                    onclick="getOrderStatus({{ $item }})">
                                <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
            <nav aria-label="Page navigation example">
                {{$items->links()}}
            </nav>
        </form>
    </div>
    @include('layouts.order_status')


@endsection

