@extends('layouts.master')
@section('invoice','active-link')
@section('content')
    <invoice-detail :items="{{json_encode($items)}}"
                    :periods="{{json_encode($periods)}}"
                    :members="{{json_encode($members)}}"
                    :marker="{{json_encode($marker)}}"
                    :session="{{json_encode($session)}}"
                    :id="{{$id}}"
                    :is_submit="true"
    >

    </invoice-detail>
@endsection

