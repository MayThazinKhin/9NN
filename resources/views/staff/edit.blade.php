<div class="modal fade" id="edit_staff_modal" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;">
            <form id="edit_form">
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Edit Admin</p>
                    </div>
                </div>
                <div class="modal-body mx-4 pt-2 pb-0">
                    <div class="mb-3">
                        <label for="name_edit" class="label-form mb-1" style="font-size: 16px!important;">အမည်</label>
                        <input type="text" id="name_edit" class="input-form" placeholder="အမည်ကိုထည့်ရန်" style="font-size: 15px!important;">
                    </div>
                    <div class="mb-3">
                        <label for="phone_edit" class="label-form mb-1" style="font-size: 16px!important;">ဖုန်းနံပတ်</label>
                        <input type="text" id="phone_edit" class="input-form" placeholder="ဖုန်းနံပတ် ထည့်ရန်" style="font-size: 15px!important;">
                    </div>
                    <div class="mb-3">
                        <label for="password_edit" class="label-form" style="font-size: 14px!important;color: #4b4e51">Password</label>
                        <input type="password" id="password_edit" class="input-form" placeholder="Password" style="font-size: 15px!important;">
                    </div>
                    <div class="mb-3">
                        <label for="role_edit" class="label-form mb-1" style="font-size: 14px!important;">Role</label>
                        <select name="color" id="role_edit" class="selectpicker d-block" data-width="100%" title="Choice Role"
                                data-style="select-form w-100 mm" v-model="isadmin">
                            <option value="1">Admin</option>
                            <option value="2">Marker</option>
                        </select>
                    </div>
                    <div class="mb-3" v-if="isadmin==='2'">
                        <label for="fees_edit" class="label-form" style="font-size: 14px!important;color: #4b4e51">Fees per min</label>
                        <input type="password" id="fees_edit" class="input-form" placeholder="Password" style="font-size: 15px!important;">
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
