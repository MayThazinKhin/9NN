@extends('layouts.master')
@section('invoice','active-link')
@section('content')
    <invoice-detail :items="{{json_encode($items)}}"
                    :periods="{{json_encode($periods)}}"
                    :members="{{json_encode($members)}}"
                    :marker_fee="{{json_encode($marker_fee)}}"
                    :id="{{$id}}"
                    :is_submit="false"
    >

    </invoice-detail>
@endsection

