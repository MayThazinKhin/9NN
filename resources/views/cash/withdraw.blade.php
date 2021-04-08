@extends('layouts.master')
@section('content_title', 'Withdraw')
@section('withdraw','active-link')
@section('add','#add')
{{--@section('route','/items/search')--}}

{{--@include('item.create')--}}
{{--@include('item.edit')--}}
@include('layouts.delete')

@section('content')
    <div>
        <form class="position-relative w-100">
            <div class="w-100 bg-white p-3 mt-3" style="min-height: 76vh">
                <table class="table table-borderless" id="myTable">
                    <thead>
                    <tr class="" style="border-bottom: 2px solid #dee2e6">
                        <th class="table-header font-weight-normal">Id</th>
                        <th class="table-header font-weight-normal">Date</th>
                        <th class="table-header font-weight-normal">Title</th>
                        <th class="table-header font-weight-normal">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($ledgers as $i=>$ledger)
                    <tr>
                        <th scope="row" class="padding-table-row">
                                <span class="text-td font-weight-normal">
                                     {{ $ledgers->perPage()*($ledgers->currentPage()-1)+ (++$i) }}
                                </span>
                        </th>

                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                                {{$ledger->date}}
                            </div>
                        </td>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                               {{$ledger->title_name}}
                            </div>
                        </td>
                        <td class="padding-table-row">
                            <div class="text-td text-capitalize">
                               - {{$ledger->value}}
                            </div>
                        </td>


                    </tr>@endforeach
                    </tbody>

                </table>
            </div>
                        <nav aria-label="Page navigation example">
                            {{$ledgers->links()}}
                        </nav>
        </form>
    </div>
    @php
        $input1 = (object) ["type" => "text", "label" => "Amount", "name" => "value"];
        $inputs = array($input1);
        $edit_inputs = array($input1);
    @endphp
    <edit-modal title="Transfer" :inputs="{{json_encode($edit_inputs)}}" url=""></edit-modal>
    {{--    <edit-modal title="ထုတ်ရန်" :inputs="{{json_encode($edit_inputs)}}" url=""></edit-modal>--}}
@endsection
