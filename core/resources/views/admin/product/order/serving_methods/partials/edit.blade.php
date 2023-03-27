<!-- Modal -->
<div class="modal fade" id="editModal{{$sm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Edit ({{$sm->name}})</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.product.servingMethodUpdate')}}" method="POST" id="editForm{{$sm->id}}">
                @csrf
                <input type="hidden" name="serving_method" value="{{$sm->id}}">
                <div class="form-group">
                    <label>Serial Number</label>
                    <input type="text" class="form-control" name="serial_number" placeholder="Serial Number" autocomplete="off" value="{{$sm->serial_number}}">
                    <p class="text-warning mb-0">The higher the 'serial number' is, the later is 'serving method' will be shown.</p>
                    <p class="text-danger mb-0" id="errserial_number"></p>
                </div>

                <div class="form-group">
                    <label>Note</label>
                    <textarea class="form-control" name="note" placeholder="Note" rows="4">{{$sm->note}}</textarea>
                    <p class="text-danger" id="errnote"></p>
                </div>

            </form>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success" form="editForm{{$sm->id}}">Save</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
