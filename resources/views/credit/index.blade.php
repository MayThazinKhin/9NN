@extends('layouts.master')
@section('content_title', 'Invoices')
@section('invoice','active-link')
@section('content')
    <div>
        <form class="position-relative w-100 h-100 bg-white p-3 mt-3">
            <table class="table table-borderless" id="myTable">
                <thead>
                <tr class="" style="border-bottom: 2px solid #dee2e6">
                    <th class="table-header font-weight-normal">Date</th>
                    <th class="table-header font-weight-normal">Member Name</th>
                    <th class="table-header font-weight-normal">Credit</th>
                    <th class="table-header font-weight-normal"> &nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($invoices as $i=>$invoice)
                    <tr>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$invoice->created_at}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$invoice->member_name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$invoice->credit}}
                            </div>
                        </td>

                        <td class="padding-table-row w88px">
                            <button type="button" class="btn-clear " title="Edit"  id="edit-button">
                                <a class="a-clear" href="{{route('invoice.detail',['id' => $invoice->id])}}">
                                    <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>
        </form>
    </div>

@endsection
