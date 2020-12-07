@extends('layouts.master')
@section('content_title', 'Create Bar')
@section('bar','active-link')
@section('content')
    <header class="header pl-2">
        <div class="d-flex justify-content-between">
            <nav style="margin-top: 8px">
                <a href="#" class="a-clear text-dark fm-roboto fs17">Bar Management</a>
                <span> / </span>
                <a href="#" class="a-clear text-dark fm-roboto fs17">Edit</a>

            </nav>
            <div>
            </div>
        </div>
    </header>
    <form action="{{route('bars.update',['bar' => $bar->id])}}" method="post">
        @csrf
        @method('patch')
        <div>
            <div class="position-relative w-100 h-100 bg-white p-3 mt-3">
                <div class="row mx-0 mb-3">
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Name</label>
                        <input name="name" type="text" value="{{$bar->name}}" class="input-form" placeholder="Name" style="font-size: 14px!important;">
                        <span class="text-danger">{{$errors->first('name')}}</span>

                    </div>
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Price</label>
                        <input name="price" type="text" value="{{$bar->price}}" class="input-form" placeholder="Price" style="font-size: 14px!important;">
                        <span class="text-danger">{{$errors->first('price')}}</span>

                    </div>
                </div>
                <div class="row mx-0 mb-3">
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Type</label>
                        <select id="type_edit" class="selectpicker d-block" data-width="100%" title="Types"
                                data-style="select-form w-100">
                            <option @if($bar->category->type->name == 'bar') selected @endif value="bar">Bar</option>
                            <option @if($bar->category->type->name == 'menu') selected @endif value="menu">Menu</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Category</label>
                        <select name="category_id" id="category" class="selectpicker d-block" data-width="100%" title="Categories"
                                data-style="select-form w-100">
                        </select>
                        <span class="text-danger">{{$errors->first('category_id')}}</span>

                    </div>
                </div>
                <div class="row mx-0 mb-3">
                    <div class="col-8">
                        <div class="modal-footer border-0 justify-content-between mx-0 px-2 mb-2">
                            <button type="button" class="btn pl-0" data-dismiss="modal" style="font-size: 16px!important;">Cancel</button>
                            <button type="submit" class="btn btn-danger px-3" style="font-size: 16px!important;" id="confirm-add-button"> Edit </button>
                        </div>
                    </div>
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



            let categories=[];


            let form = {
                'type' : $("#type_edit").val()
            };
            $.ajaxSetup({
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $.post('/categories', JSON.stringify(form))
                .done(function(data) {
                    // if(data.success){
                    categories = [...data];
                    refreshSelectPicker();

                    categories.forEach(function(category){
                        $('#category').append(`
                                    <option value="${ category.id }">${category.name}</option>
                            `)
                    })
                    refreshSelectPicker();

                    // }
                });














            function refreshSelectPicker(){
                $('.selectpicker').selectpicker('refresh');
            }



            $('#type_edit').change(function (){
                refreshSelectPicker();
                categories = [];
                $('#category').empty();



                let form = {
                    'type' : $(this).val()
                };
                $.ajaxSetup({
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });

                $.post('/categories', JSON.stringify(form))
                    .done(function(data) {
                        // if(data.success){
                        categories = [...data];
                        refreshSelectPicker();

                        categories.forEach(function(category){
                            $('#category').append(`
                                    <option value="${ category.id }">${category.name}</option>
                            `)
                        })
                        refreshSelectPicker();

                        // }
                    });
            })
        });



    </script>
@endsection
