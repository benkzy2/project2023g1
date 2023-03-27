<!-- Details Modal -->
<div class="modal fade" id="detailsModal{{$reservation->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <strong class="text-capitalize">Name:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($reservation->name)}}</div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">
                    <strong class="text-capitalize">Email:</strong>
                </div>
                <div class="col-lg-8">{{convertUtf8($reservation->email)}}</div>
            </div>
            <hr>

          @php
            $fields = json_decode($reservation->fields, true);
          @endphp

          @if (!empty($fields))
            @foreach ($fields as $key => $field)
            <div class="row">
                <div class="col-lg-4">
                <strong class="text-capitalize">{{str_replace("_"," ",$key)}}:</strong>
                </div>
                <div class="col-lg-8">
                    @if (is_array($field))
                        @php
                            $str = implode(", ", $field);
                        @endphp
                        {{convertUtf8($str)}}
                    @else
                        {{convertUtf8($field)}}
                    @endif
                </div>
            </div>
            <hr>
            @endforeach
          @endif


          <div class="row">
            <div class="col-lg-4">
              <strong>Status:</strong>
            </div>
            <div class="col-lg-8">
              @if ($reservation->status == 1)
                <span class="badge badge-warning">Pending</span>
              @elseif ($reservation->status == 2)
                <span class="badge badge-success">Accepted</span>
              @elseif ($reservation->status == 3)
                <span class="badge badge-danger">Rejected</span>
              @endif
            </div>
          </div>
          <hr>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
