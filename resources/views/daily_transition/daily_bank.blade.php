@extends('layouts.master')
@section('content_title', 'Daily Bank Opening Closing')
@section('daily_bank','active-link')

@section('content_header')

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
                        <th class="table-header font-weight-normal">Opening Amount</th>
                        <th class="table-header font-weight-normal">Closing Amount</th>
                        <th class="table-header font-weight-normal"> &nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cashes as $i=>$cash)

                        <tr>
                            <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                     {{ $cashes->perPage()*($cashes->currentPage()-1)+ (++$i) }}
                                </span>
                            </th>
                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$cash->date}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$cash->opening}}
                                </div>
                            </td>

                            <td class="padding-table-row">
                                <div class="text-td text-capitalize">
                                    {{$cash->closing}}
                                </div>
                            </td>



                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
            <nav aria-label="Page navigation example">
                {{$cashes->links()}}
            </nav>
        </form>
    </div>



@endsection
