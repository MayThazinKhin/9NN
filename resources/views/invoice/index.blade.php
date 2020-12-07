@extends('layouts.master')
@section('content_title', 'Invoices')
@section('invoice','active-link')
@section('content')
    <div>
        <header class="header pl-2">
            <div class="d-flex justify-content-between">
                <nav style="margin-top: 8px">
                    <a href="#" class="a-clear text-dark fm-roboto fs17">Invoice Management</a>
                </nav>
                <div>
                </div>
            </div>
        </header>
        <form class="position-relative w-100">
            <div class="w-100 bg-white p-3 mt-3" style="min-height: 76vh">
            <table class="table table-borderless" id="myTable">
                <thead>
                <tr class="" style="border-bottom: 2px solid #dee2e6">
                    <th class="table-header font-weight-normal">Date</th>
                    <th class="table-header font-weight-normal">Marker Name</th>
                    <th class="table-header font-weight-normal">Table Name</th>
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
                                {{$invoice->marker_name}}
                            </div>
                        </td>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$invoice->table_name}}
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
            </div>
        </form>
    </div>

@endsection

