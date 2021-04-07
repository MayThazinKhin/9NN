<div class="modal fade" id="cash" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;" id="app">
            <form action="/ledger_create"  method="post">
                @csrf
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">
                            Cash</p>
                    </div>
                </div>

                <div class="modal-body mx-4 pt-2 pb-0">

                    <div class="mb-4">
                        <label class="label-form mb-1" style="font-size: 15px!important;">Amount</label>
                        <input type="text" class="input-form" placeholder="Amount" style="font-size: 14px!important;" name="value" autocomplete="off">
                    </div>
                    <input type="text" id="name" name="title" hidden >
                    <input type="text" id="name" name="is_redirect" value="true" hidden >
                </div>
                <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                    <button class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">Cancel</button>
                    <button type="submit" class="btn btn-danger pl-3" style="font-size: 16px!important;"> Confirm </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="application/javascript">
    function setId(id)
    {
        $('#name').val(id);
    }

</script>
