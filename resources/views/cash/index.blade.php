@extends('layouts.master')
@section('content_title', 'Cash')
@section('cash','active-link')
@section('add','#add')
{{--@section('route','/items/search')--}}

{{--@include('item.create')--}}
{{--@include('item.edit')--}}
@include('layouts.delete')

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
                        <th class="table-header font-weight-normal">Title</th>
                        <th class="table-header font-weight-normal">Amount</th>
                        <th class="table-header font-weight-normal"> &nbsp;</th>
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
                                    {{$account->value}}
                                </div>
                            </td>
                            <td class="padding-table-row w88px">
{{--                                <edit-button entity="{{$account}}"></edit-button>--}}
                                <button type="button"
                                        class="btn-clear "
                                        title="Edit"
                                        data-toggle="modal"
                                        onclick="setId({{$account->id}},{{$account->value}})"
                                        data-target="#cash"
                                >
                                    <a class="a-clear">
                                        <i class="far fa-file-edit fw300" style="color:#673ab7;"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>

                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>

        </form>
    </div>
    @include('cash.add_modal_box')

{{--    @php--}}
{{--        $input1 = (object) ["type" => "text", "label" => "Amount", "name" => "value" ];--}}
{{--        $input2 = (object) ["type" => "hidden", "label" => "Title", "name" => "title", "value" => ""];--}}
{{--        $inputs = array($input1,$input2);--}}
{{--    @endphp--}}

{{--    <add-modal title="Add Cash" :inputs="{{json_encode($inputs)}}" url="/ledger_create"></add-modal>--}}


{{--    <script type="application/javascript">--}}
{{--        function setId(id)--}}
{{--        {--}}
{{--            let test = '<?php echo json_encode($input2); ?>';--}}
{{--            test.value = id;--}}
{{--            console.log(test);--}}
{{--            --}}{{--console.log({{json_encode($inputs)}});--}}
{{--        }--}}
{{--    </script>--}}

@endsection


