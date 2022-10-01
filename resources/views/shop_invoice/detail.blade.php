@extends('layouts.master')
@section('shop_invoice','active-link')
@section('content')

    <shop-invoice-detail :items="{{json_encode($receipt)}}"
                    :members="{{json_encode($members)}}"
                    :id="{{$id}}"
                         :is_submit="true"
    >

    </shop-invoice-detail>
@endsection

