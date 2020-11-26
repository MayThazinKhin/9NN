@extends('layouts.master')
@section('content_title', 'Inventory Management')

@section('content')
    <header class="header pl-2">
        <div class="d-flex justify-content-between">
            <nav style="margin-top: 8px">
                <a href="#" class="a-clear text-dark fm-roboto fs17">@yield('content_title') </a>
            </nav>
        </div>
    </header>
    <div>
        <form class="position-relative w-100 h-100 bg-white p-3 mt-3">
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
            <nav aria-label="Page navigation example">
                {{$inventories->links()}}
            </nav>
    </form>
    </div>

    @php
        $input1 = (object) ["type" => "text", "label" => "Name", "name" => "name"];
        $input2 = (object) ["type" => "password", "label" => "Password", "name" => "password"];
        $input3 = (object) ["type" => "select", "label" => "Password", "name" => "role_id"  ];
        $input4 = (object) ["type" => "text", "label" => "Fee Per Min", "name" => "fee"];
        $inputs = array($input1,$input2,$input3,$input4);
    @endphp

{{--    <add-modal title="Add New Admin" :inputs="{{json_encode($inputs)}}" url="/admin"></add-modal>--}}
{{--    <edit-modal title="Edit Admin" :inputs="{{json_encode($inputs)}}" url="/admin"></edit-modal>--}}

@endsection
