@extends('layouts.master')
@section('content_title', 'Shop Management')
@section('item','active-link')
@section('add','#add')
@section('route','/items/search')

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
                <th class="table-header font-weight-normal">Name</th>
                <th class="table-header font-weight-normal">Category</th>
                <th class="table-header font-weight-normal">Price</th>
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
                        {{$item->name}}
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$item->category_name}}
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$item->price}}
                    </div>
                </td>

                <td class="padding-table-row w88px">
                    <edit-button entity="{{$item}}"></edit-button>

                    <button type="button" onclick="deleteItem('items',{{$item->id}})" id="delete-button" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                        <i class="fal fa-times text-danger fw300"></i>
                    </button>
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

    @php
        $input1 = (object) ["type" => "text", "label" => "Name", "name" => "name"];
        $input2 = (object) ["type" => "text", "label" => "Price", "name" => "price"];
        $input3 = (object) ["type" => "select", "label" => "Category", "name" => "category_id", "data" => $categories];
        $inputs = array($input1,$input2,$input3);
    @endphp

    <add-modal title="Add New Item" :inputs="{{json_encode($inputs)}}" url="/items"></add-modal>
    <edit-modal title="Edit Item" :inputs="{{json_encode($inputs)}}" url="/items"></edit-modal>
@endsection
