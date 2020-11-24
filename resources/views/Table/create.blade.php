<div class="modal fade" id="add_table_modal" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;" id="app">
            <form id="add_form" action="{{route('table.store')}}"  method="post">
                @csrf
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Add New Table</p>
                    </div>
                </div>

                <div class="modal-body mx-4 pt-2 mt-1 pb-0">
                    <div class="mb-4">
                        <label for="name" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Table Name</label>
                        <input type="text" name= "name" id="name" class="input-form" placeholder="Table Name" style="font-size: 14px!important;">
                    </div>
                    <div class="mb-4">
                        <label for="price" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Price Per Minute</label>
                        <input type="number" name="price" id="price" class="input-form" placeholder="Price" style="font-size: 14px!important;">
                    </div>

                </div>
                <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                    <button type="button" class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">မလုပ်တော့ပါ</button>
                    <button type="submit" class="btn btn-info pl-3" style="font-size: 16px!important;" id="confirm-add-button"> လုပ်မည် </button>
                </div>
            </form>
        </div>
    </div>
</div>
