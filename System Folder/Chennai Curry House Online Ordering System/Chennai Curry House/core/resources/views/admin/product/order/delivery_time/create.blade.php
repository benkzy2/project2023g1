<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Time Frame</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('admin.timeframe.store')}}" id="ajaxForm" method="POST">
            @csrf
            <input type="hidden" name="day" value="">
            <div class="form-group">
                <label for="">Start Time *</label>
                <input type="text" name="start" class="form-control timepicker" autocomplete="off">
                <p id="errstart" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
                <label for="">End Time *</label>
                <input type="text" name="end" class="form-control timepicker" autocomplete="off">
                <p id="errend" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
                <label for="">Maximum Orders *</label>
                <input type="number" name="max_orders" class="form-control" autocomplete="off" value="0">
                <p class="mb-0 text-danger em" id="errmax_orders"></p>
                <p class="text-warning mb-0">**Specify the maximum number of orders the restaurant can deliver during this time frame</p>
                <p class="text-warning mb-0">**Enter 0 for unlimited orders</p>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-secondary btn-danger" data-dismiss="modal">Close</button>
          <button id="submitBtn" type="button" class="btn btn-primary btn-success">Add</button>
        </div>
      </div>
    </div>
  </div>
