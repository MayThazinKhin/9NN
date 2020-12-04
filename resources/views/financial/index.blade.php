@extends('layouts.master')
@section('content_title', 'Financial Management')
@section('financial','active-link')
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
                <th class="table-header font-weight-normal">Name</th>
                <th class="table-header font-weight-normal">Value</th>
            </tr>
            </thead>
            <tbody>

            @foreach($primaries as $i=>$primary)
            <tr>
                <th scope="row" class="padding-table-row">
                    <span class="text-td font-weight-normal">
                       {{ $primaries->perPage()*($primaries->currentPage()-1)+ (++$i) }}
                    </span>
                </th>
                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        <a href=""></a>  {{$primary->name}} </a>
                    </div>
                </td>

                <td class="padding-table-row">
                    <div class="text-td text-capitalize">
                        {{$primary->value}}
                    </div>
                </td>

            </tr>
            @endforeach
            </tbody>

        </table>
    </form>
    </div>




@endsection
