
  <!-- Send Mail Modal -->
  <div class="modal fade" id="mailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{__('Send Mail')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="ajaxEditForm" class="" action="{{route('admin.user.mail')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{__('Email Address')}} **</label>
                        <input id="inemail" type="text" class="form-control" name="email" value="" placeholder="Enter email">
                        <p id="eerremail" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Subject')}} **</label>
                        <input id="insubject" type="text" class="form-control" name="subject" value="" placeholder="{{__('Enter subject')}}">
                        <p id="eerrsubject" class="mb-0 text-danger em"></p>
                    </div>
                    <div class="form-group">
                        <label for="">{{__('Message')}} **</label>
                        <textarea id="inmessage" class="form-control summernote" name="message" placeholder="{{__('Enter message')}}" data-height="150"></textarea>
                        <p id="eerrmessage" class="mb-0 text-danger em"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Close')}}</button>
                <button id="updateBtn" type="button" class="btn btn-primary">{{__('Send Mail')}}</button>
            </div>
        </div>
    </div>
</div>