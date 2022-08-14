<div class="modal fade" id="notify_model" tabindex="-1" role="dialog" aria-labelledby="add" aria-hidden="false">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content" style="border-radius: 4px;" id="app">
            <form id="add_form" action="{{route('confirm_period')}}"  method="post">
                @csrf
                <div class="modal-header border-bottom-0 mt-3">
                    <div class="text-left pl-4 pt-1">
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Marker Name  -   {{$marker_name}}</p>
                        <p style="font-family: 'Roboto',sans-serif;font-size: 18px!important;" class="fs18 mb-0 font-weight-bold">Table Name  -   {{$table_name}}</p>
                    </div>
                </div>
                    <input type="text" hidden  name="session_id" value="{{$session_id}}">
                <div class="modal-footer border-0 justify-content-between mx-3 px-4 mb-2 mt-4">
                    <button type="submit" class="btn btn-info pl-3" style="font-size: 16px!important;" id="confirm-add-button"> အတည်ပြုမည်  </button>
                    <button type="button" class="btn pr-0" data-dismiss="modal" style="font-size: 16px!important;">မလုပ်တော့ပါ</button>
                </div>
            </form>
        </div>
    </div>
</div>
