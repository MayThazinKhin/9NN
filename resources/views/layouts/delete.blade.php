<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" id="delete-item">
            @csrf
            @method('delete')
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure?
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Delete</button>
            </div>
        </div>
        </form>
    </div>
</div>

<script type="application/javascript">
    function deleteItem($item,$id) {
        $('#delete-item').attr('action', $item+ '/' + $id);
    }


</script>
