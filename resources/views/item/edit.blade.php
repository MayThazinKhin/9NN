@extends('layouts.master')
@section('content_title', 'Edit Shop')
@section('content')
    <form action="{{route('items.update',['item' => $item->id])}}" method="post">
        @csrf
        <div>
            <div class="position-relative w-100 h-100 bg-white p-3 mt-3">
                <div class="row mx-0 mb-3">
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Name</label>
                        <input name="name" value="{{$item->name}}" type="text" class="input-form" placeholder="Name" style="font-size: 14px!important;">
                    </div>
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Price</label>
                        <input name="price" value="{{$item->price}}" type="text" class="input-form" placeholder="Price" style="font-size: 14px!important;">
                    </div>
                </div>
                <div class="row mx-0 mb-3">
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Category</label>
                        <select name="category_name" class="selectpicker d-block" data-width="100%" title="select1..."
                                data-style="select-form w-100">
                            <option value="1">select1.1</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Count</label>
                        <input name="count" value="{{$item->count}}" type="text" class="input-form" placeholder="Count" style="font-size: 14px!important;">
                    </div>
                </div>

                <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                    <button type="button" class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">မလုပ်တော့ပါ</button>
                    <button type="submit" class="btn btn-info pl-3" style="font-size: 16px!important;" id="confirm-add-button"> Add Shop </button>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('script_index')
    <script>
        $(document).ready(function (){
            $('.normal').autosize();
            $('.animated-txtarea').autosize();

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.selectpicker').selectpicker('refresh');
            $('#monthpicker').MonthPicker({ Button: false });
            $(".yearpicker").yearpicker({
                // autohide:true,
                // initialYear:null,
                onShow:null,
                year:null,
                startYear: 2015,
                endYear: 2026,
                pick:null,
                show:null,

            });
            $('.pickdate').datepicker({
                // altFormat:"dd-mm-YY",
                dateFormat:'D, dd M yy',
                changeYear:true,
                changeMonth:true,
                showButtonPanel: true,
                autoSize: true,
                hideIfNoPrevNext: true,
                yearRange: "1960:2030",
                duration:'slow',
            });
        });




    </script>
@endsection
