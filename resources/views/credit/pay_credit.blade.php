<div class="modal fade" id="credit_modal" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;" id="app">
            <form id="add_form" action="{{route('pay_credits')}}"  method="post">
                @csrf
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">ပေးချေငွေ</p>
                    </div>
                </div>
                <div class="modal-body mx-4 pt-2 pb-0">
                    <input type="hidden" name="member_id" value="" id="member_id">
                    <div class="mb-3">
                        <input type="text" id="name" name="paid_credit" class="input-form" placeholder="ပေးချေငွေထည့်ရန်" style="font-size: 15px!important;">
                    </div>
                </div>
                <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                    <button type="button" class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">မလုပ်တော့ပါ</button>
                    <button type="submit" class="btn btn-info pl-3" style="font-size: 16px!important;" id="confirm-add-button"> Submit </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    function setMemberID(id)
    {
        $('#member_id').val(id);
    }
</script>

