<div class="modal fade" id="add_member_modal" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;" id="app">
            <form id="add_form" action="{{route('member.store')}}"  method="post">
                @csrf
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Add New Member</p>
                    </div>
                </div>

                <div class="modal-body mx-4 pt-2 mt-1 pb-0">
                    <div class="mb-4">
                        <label for="name" class="label-form mb-1" style="font-size: 14px!important;">Member Name</label>
                        <input type="text" id="name" class="input-form" placeholder="Member Name" style="font-size: 14px!important;">
                    </div>
                    <div class="mb-4">
                        <label for="ph" class="label-form mb-1" style="font-size: 14px!important;">Phone Number</label>
                        <input type="text" id="ph" class="input-form" placeholder="Phone number" style="font-size: 14px!important;">
                    </div>

                    <div class="mb-4">
                        <label for="allowance" class="label-form mb-1" style="font-size: 14px!important;">Maximum Allowance</label>
                        <input type="text" id="allowance" class="input-form" placeholder="Maximum Allowance" style="font-size: 14px!important;">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="label-form mb-1" style="font-size: 14px!important;">Address</label>
                        <textarea id="address" cols="5" class="input-form animated-txtarea" rows="5" style="font-size: 14px!important;"></textarea>
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
