@extends('layouts.master')
@section('content_title', 'Create Inventory')
@section('content')
    <form action="{{route('inventory.store')}}" method="post">
        @csrf
            <div>
                <div class="position-relative w-100 h-100 bg-white p-3 mt-3">
                    <div class="row mx-0 mb-3">
                        <div class="col-4">
                            <label for="select1" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">select1</label>
                            <select name="select1" id="select1" class="selectpicker d-block" data-width="100%" title="select1..."
                                    data-style="select-form w-100">
                                <option value="1">select1.1</option>
                                <option value="2">select1.2</option>
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="select2" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">select2</label>
                            <select name="select1" id="select2" class="selectpicker d-block" data-width="100%" title="select2..."
                                    data-style="select-form w-100">
                                <option value="1">select2.1</option>
                                <option value="2">select2.2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mx-0 mb-3">
                        <div class="col-4">
                            <label for="input1" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">input</label>
                            <input type="text" id="input1" class="input-form" placeholder="input..." style="font-size: 14px!important;">
                        </div>
                        <div class="col-4">
                            <label for="input2" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">input</label>
                            <input type="text" id="input2" class="input-form" placeholder="input..." style="font-size: 14px!important;">
                        </div>
                    </div>
                    <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                        <button type="button" class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">မလုပ်တော့ပါ</button>
                        <button type="submit" class="btn btn-info pl-3" style="font-size: 16px!important;" id="confirm-add-button"> Add Inventory </button>
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

        new Vue({
            el:'#app',
            data:{

            }
        })


    </script>
@endsection
