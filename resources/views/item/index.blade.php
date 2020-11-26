@extends('layouts.master')
@section('content_title', 'Item Management')
@section('add','#add')
@section('route','/items/search')

{{--@include('item.create')--}}
{{--@include('item.edit')--}}
@include('layouts.delete')

@section('select_box')
    <div class="d-inline-block">
        <label>
            <select name="color" class="selectpicker d-block" data-width="100%"
                    data-style="select-form-header w-100">
                <option value="1">Bar</option>
                <option value="2">Kitchen</option>
            </select>
        </label>
    </div>
@endsection
@section('content_header')
    @include('layouts.content_header')
@endsection
@section('content')
    <div>
        <form class="position-relative w-100 h-100 bg-white p-3 mt-3">
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
                    <button type="button" class="btn-clear " title="Edit"  id="edit-button" data-toggle="modal" data-target="#edit_item_modal">
                        <a class="a-clear">
                            <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>
                        </a>
                    </button>
                    <button type="button" onclick="deleteItem('items',{{$item->id}})" id="delete-button" class="btn-clear" title="Delete"  data-toggle="modal" data-target="#delete">
                        <i class="fal fa-times text-danger fw300"></i>
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
@endsection
