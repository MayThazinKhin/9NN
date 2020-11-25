<div class="modal fade" id="edit_member_modal" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;">
            <form id="edit_form">
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Edit Member</p>
                    </div>
                </div>
                <div class="modal-body mx-4 pt-2 mt-1 pb-0">
                    <div class="mb-4">
                        <label for="name_edit" class="label-form mb-1" style="font-size: 14px!important;">Member Name</label>
                        <input type="text" id="name_edit" class="input-form" placeholder="Member Name" style="font-size: 14px!important;">
                    </div>
                    <div class="mb-4">
                        <label for="ph_edit" class="label-form mb-1" style="font-size: 14px!important;">Phone Number</label>
                        <input type="text" id="ph_edit" class="input-form" placeholder="Phone number" style="font-size: 14px!important;">
                    </div>

                    <div class="mb-4">
                        <label for="allowance_edit" class="label-form mb-1" style="font-size: 14px!important;">Maximum Allowance</label>
                        <input type="text" id="allowance_edit" class="input-form" placeholder="Maximum Allowanceß" style="font-size: 14px!important;">
                    </div>
                    <div class="mb-4">
                        <label for="address_edit" class="label-form mb-1" style="font-size: 14px!important;">Address</label>
                        <textarea id="address_edit" cols="5" class="input-form animated-txtarea" rows="5" style="font-size: 14px!important;"></textarea>
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
