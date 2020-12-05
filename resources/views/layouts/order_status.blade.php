<div class="modal fade" id="order_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kitchen Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="update_status">
                @csrf
                @method('post')
                <div class="modal-body">
                    <select name="status" id="edit_status" class="selectpicker show-menu-arrow">
                        <option value="done">Done</option>
                        <option value="received">Received</option>
                        <option value="operation">Operation</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script type="application/javascript">


    function getOrderStatus(item){
        $("#edit_status").val(item.status).change();
        $('#update_status').attr('action', 'update_kitchen_status/' + item.id)

    }
</script>
