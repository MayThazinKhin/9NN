@extends('layouts.master')
@section('menu_invoice','active-link')
@section('content')

    {{--    <invoice-detail :items="{{json_encode($items)}}" :periods="{{json_encode($periods)}}" :members="{{json_encode($members)}}" :id="{{$id}}"></invoice-detail>--}}
    <div>
        <form class="position-relative w-100 h-100 pb-3 mt-3">
            <div class="d-flex justify-content-between mb-3">
                <nav style="margin-top: 8px">
                    <a href="#" class="a-clear text-dark fm-roboto fs17">Menu Invoices</a>
                </nav>
                <div>

                    <div class="d-inline-block ml-3">
                        <button type="button" class="btn btn-danger py-1 rounded-0" style="font-size: 16px!important;">Invoices ထုတ်ရန်</button>
                    </div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col">
                    <div class="row bg-white mx-0 py-3 mb-3">
                        <div class="col-5 pt-2" style="border-right: 1px solid #ddd">

                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Total</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 14 </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Discount</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 22 </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="mb-0" style="font-size: 16px!important;font-family: Padauk!important;">ပေးချေငွေ</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 2323 </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Tax</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 5 </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="mb-0" style="font-size: 16px!important;font-family: Padauk!important;">အကြွေး</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 442 </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="label-form">Net Total</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 123 </p>
                                </div>
                            </div>
                            <div class="row mx-0 mb-3">
                                <div class="col-5">
                                    <p class="mb-0" style="font-size: 16px!important;font-family: Padauk!important;">ပြန်အမ်းငွေ</p>
                                </div>
                                <div class="col">
                                    <p class="label-form" style="color:#6b6e71;">MMKs 12323 </p>
                                </div>
                            </div>
                        </div>
                        <div class="col pt-2 px-4 pt-3 pb-2">
                            <div class="row">
                                <div class="col">
                                    <label for="" class="label-form" style="color: #5b6167!important;">
                                        Member <span style="font-size: 16px!important;font-family: Padauk!important;">အမည်</span>
                                    </label>
                                    <input type="text" class="input-form pt-0">
                                    {{--                                        <form action="" method="post">--}}
                                    {{--                                            @csrf--}}
                                    {{--                                            <label class="search-box-container">--}}
                                    {{--                                                <input type="text" id="myInput" name="query" class="search-box py-1 "  autocomplete="off">--}}
                                    {{--                                                <i class="fal fa-search search-icon"></i>--}}
                                    {{--                                            </label>--}}
                                    {{--                                        </form>--}}
                                </div>
                                <div class="col mb-3">
                                    <label for="" class="label-form" style="color: #5b6167!important;">
                                        Discount <span style="font-size: 16px!important;font-family: Padauk!important;">ပမာဏ</span>
                                    </label>
                                    <input type="text" class="input-form pt-0">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="" class="label-form" style="color: #5b6167!important;">
                                        <span style="font-size: 16px!important;font-family: Padauk!important;">ပေးချေငွေ</span>
                                    </label>
                                    <input type="text" class="input-form pt-0">
                                </div>
                                <div class="col mb-3 pt-3">
                                    <input type="checkbox" class="input-form d-inline-block mr-2" style="width: fit-content;">
                                    <label for="" class="label-form d-inline-block" style="color: #5b6167!important;">
                                        Tax <span style="font-size: 16px!important;font-family: Padauk!important;"> ကပ် မကပ်</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0">
                        <div class="col bg-white position-relative" style="min-height: 50vh;padding-bottom: 52px">
                            <table class="table table-borderless">
                                <thead>
                                <tr class="" style="border-bottom: 2px solid #dee2e6">
                                    <th class="table-header font-weight-normal">
                                        No.
                                    </th>
                                    <th class="table-header" style="font-size: 16px!important;font-family: Padauk!important;">မီနူးနာမည်</th>
                                    <th class="table-header" style="font-size: 16px!important;">Price</th>
                                    <th class="table-header" style="font-size: 16px!important;font-family: Padauk!important;">ပမာဏ</th>
                                    <th class="table-header text-right" style="font-size: 16px!important;font-family: Padauk!important;">ကျသင့်ငွေ</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row" class="padding-table-row">
                                                <span class="text-td font-weight-normal">
                                                      1
                                                </span>
                                    </th>
                                    <td class="padding-table-row">
                                        <div class="text-td text-capitalize">
                                            test
                                        </div>
                                    </td>
                                    <td class="padding-table-row">
                                        <div class="text-td">
                                            11
                                        </div>
                                    </td>
                                    <td class="padding-table-row">
                                        <div class="text-td">
                                            2
                                        </div>
                                    </td>
                                    <td class="padding-table-row">
                                        <div class="text-td text-right">
                                            232323
                                        </div>
                                    </td>
                                </tr>
                                {{--                                    @endforeach--}}
                                </tbody>
                            </table>
                            <div style="position: absolute;bottom: 8px;right: 0;width: 100%">
                                <div class="d-flex justify-content-end" style="border-top: 1px solid #e1e5e8;padding-top: 22px;margin-left: 40px;margin-right: 40px;">
                                    <p style="font-size: 16px!important;font-family: Padauk!important;font-weight: 800" class="d-inline-block">အစားအသောက်အတွက် ကျသင့်ငွေ စုစုပေါင်း</p>
                                    <p style="font-family: 'Roboto', sans-serif;font-size: 15px;padding-left: 24px;padding-right: 18px;"
                                       class="d-inline-block">222</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

