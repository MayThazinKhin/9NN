@extends('layouts.master')
@section('content_title', 'Monthly Transition')
@section('monthly_transition','active-link')
{{--@section('route','/items/search')--}}

{{--@include('item.create')--}}
{{--@include('item.edit')--}}
@include('layouts.delete')

@section('content_header')
    @include('layouts.content_header_with_datepicker')
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($accounts as $i=>$account)
                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                    {{++$i}}
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$account->name}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$account->type}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$account->value}}
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </form>
    </div>
@endsection
