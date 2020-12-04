@extends('layouts.master')
@section('content_title', 'Create Inventory')
@section('content')
    <form action="{{route('inventory.store')}}" method="post">
        @csrf
            <div>
                <div class="position-relative w-100 h-100 bg-white p-3 mt-3">
                    <div class="row mx-0 mb-3">
                        <div class="col-4">
                            <label for="input1" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Price</label>
                            <input type="text" name="price" id="input1" class="input-form" placeholder="Price" style="font-size: 14px!important;">
                            <span class="text-danger">{{$errors->first('price')}}</span>
                        </div>
                        <div class="col-4">
                            <label for="input2" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Count</label>
                            <input type="text" name="count" id="input2" class="input-form" placeholder="Count" style="font-size: 14px!important;">
                            <span class="text-danger">{{$errors->first('count')}}</span>

                        </div>
                    </div>
                    <div class="row mx-0 mb-3">
                        <div class="col-4">
                            <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Type</label>
                            <select id="type_int" class="selectpicker d-block" data-width="100%" title="Types"
                                    data-style="select-form w-100">
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="items" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Items</label>
                            <select name="item_id" id="items" class="selectpicker d-block" data-width="100%" title="Items"
                                    data-style="select-form w-100">
                            </select>
                            <span class="text-danger">{{$errors->first('item_id')}}</span>

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
            // $('.normal').autosize();
            // $('.animated-txtarea').autosize();
            //
            // $("#myInput").on("keyup", function() {
            //     var value = $(this).val().toLowerCase();
            //     $("#myTable tbody tr").filter(function() {
            //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            //     });
            // });
            // $('.selectpicker').selectpicker('refresh');
            // $('#monthpicker').MonthPicker({ Button: false });
            // $(".yearpicker").yearpicker({
            //     // autohide:true,
            //     // initialYear:null,
            //     onShow:null,
            //     year:null,
            //     startYear: 2015,
            //     endYear: 2026,
            //     pick:null,
            //     show:null,
            //
            // });
            // $('.pickdate').datepicker({
            //     // altFormat:"dd-mm-YY",
            //     dateFormat:'D, dd M yy',
            //     changeYear:true,
            //     changeMonth:true,
            //     showButtonPanel: true,
            //     autoSize: true,
            //     hideIfNoPrevNext: true,
            //     yearRange: "1960:2030",
            //     duration:'slow',
            // });

            let items=[];

            function refreshSelectPicker(){
                $('.selectpicker').selectpicker('refresh');
            }

            $('#type_int').change(function (){
                refreshSelectPicker();
                items = [];
                $('#items').empty();



                let form = {
                    'typeIDs' : [parseInt($(this).val())]
                };

                $.ajaxSetup({
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });

                $.post('/items_for_inv', JSON.stringify(form))
                    .done(function(data) {
                        // if(data.success){
                        // console.log(data);
                        items = [...data];
                        refreshSelectPicker();

                        items.forEach(function(item){
                            $('#items').append(`
                                    <option value="${ item.id }">${item.name}</option>
                            `)
                        })
                        refreshSelectPicker();

                        // }
                    });
            })



        });


    </script>
@endsection
