<div class="modal fade" id="edit_item_modal" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;">
            <form id="edit_form">
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Edit Menu</p>
                    </div>
                </div>
                <div class="modal-body mx-4 pt-2 pb-0">
                    <div class="mb-4">
                        <label for="name_edit" class="label-form mb-1" style="font-size: 16px!important;">ဟင်းပွဲ အမည်</label>
                        <input type="text" id="name_edit" class="input-form" placeholder="ဟင်းပွဲ အမည်ထည့်ရန်" style="font-size: 14px!important;">
                    </div>

                    <div class="mb-4">
                        <label for="b&c_edit" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Bar / Kitchen</label>
                        <select name="color" id="b&c_edit" class="selectpicker d-block" data-width="100%" title="Choice..."
                                data-style="select-form w-100">
                            <option value="1">Bar</option>
                            <option value="2">Kitchen</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="category_edit" class="label-form mb-1" style="font-size: 14px!important;color: #4b4e51">Category</label>
                        <select name="color" id="category_edit" class="selectpicker d-block" data-width="100%" title="Choice Category..."
                                data-style="select-form w-100">
                            <option value="1">Meal</option>
                            <option value="2">Snack</option>
                            <option value="2">Beer</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="price_edit" class="label-form mb-1" style="font-size: 16px!important;color: #4b4e51">ဈေးနှုန်း</label>
                        <input type="text" id="price_edit" class="input-form" placeholder="ဈေးနှုန်း ထည့်ရန်" style="font-size: 14px!important;">
                    </div>

                </div>
                <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                    <button type="button" class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">မလုပ်တော့ပါ</button>
                    <button type="button" class="btn btn-primary pl-3" style="font-size: 16px!important;" id="confirm-edit-button"> ပြင်ဆင်ပါ </button>
                </div>
            </form>
        </div>
    </div>
</div>
