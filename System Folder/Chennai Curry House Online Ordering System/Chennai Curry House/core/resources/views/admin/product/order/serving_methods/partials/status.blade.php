<!-- Modal -->
<div class="modal fade" id="statusModal{{$sm->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Status ({{$sm->name}})</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.product.servingMethodStatus')}}" method="POST" id="servingMethodStatus{{$sm->id}}">
                @csrf
                <input type="hidden" name="serving_method" value="{{$sm->id}}">
                <div class="form-group">
                    <label class="form-label">For Website Menu</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="website_menu" value="1" class="selectgroup-input" {{$sm->website_menu == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="website_menu" value="0" class="selectgroup-input" {{$sm->website_menu == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">For QR Menu</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="qr_menu" value="1" class="selectgroup-input" {{$sm->qr_menu == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="qr_menu" value="0" class="selectgroup-input" {{$sm->qr_menu == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">For POS</label>
                    <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="pos" value="1" class="selectgroup-input" {{$sm->pos == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="pos" value="0" class="selectgroup-input" {{$sm->pos == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success" form="servingMethodStatus{{$sm->id}}">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
