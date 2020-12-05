@extends('layouts.master')
@section('content')
    <invoice-detail :items="{{json_encode($items)}}"
                    :periods="{{json_encode($periods)}}"
                    :members="{{json_encode($members)}}"
                    :id="{{$id}}">

    </invoice-detail>
@endsection

