@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Order Times</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Order Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Order Times</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Emergency Order Close</div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.orderclose')}}" method="POST" id="orderCloseForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            @php
                                if(!empty(old())) {
                                    $orderClose = old('order_close');
                                } else {
                                    $orderClose = $be->order_close;
                                }
                            @endphp
                            <div class="form-group">
                                <label for="">Emergency Close (Anytime) **</label>
                                <select name="order_close" class="form-control">
                                    <option value="0" {{$orderClose == 0 ? 'selected' : ''}}>Disable</option>
                                    <option value="1" {{$orderClose == 1 ? 'selected' : ''}}>Enable</option>
                                </select>
                                  <p class="text-warning mb-0">If <strong class="text-danger">Enabled</strong>, then below <strong class="text-danger">Order Times</strong> will not work. The order will be closed.</p>
                                  <p class="text-warning mb-0">If <strong class="text-danger">Disabled</strong>, then the website will be able to take orders according to the below <strong class="text-danger">Order Times</strong>. </p>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-3" id="message">
                            @php
                                if(!empty(old())) {
                                    $orderCloseMessage = old('order_close_message');
                                } else {
                                    $orderCloseMessage = $be->order_close_message;
                                }
                            @endphp
                            <div class="form-group">
                                <label for="">Message for Customers **</label>
                                <input type="text" class="form-control" name="order_close_message" placeholder="Enter a message you want to show to customers" value="{{$orderCloseMessage}}">
                                @if ($errors->has('order_close_message'))
                                    <p class="text-danger mb-0">{{$errors->first('order_close_message')}}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="col-12 text-center">
                    <div class="form-group">
                        <button form="orderCloseForm" type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
      <div class="card">
        <form class="" action="{{route('admin.ordertime.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">Order Times</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">

            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                <h4 class="text-warning text-center">Orders will be received between these times.</h4>
                @csrf
                @foreach ($ordertimes as $ot)
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button style="cursor: auto;" class="btn btn-block btn-primary text-capitalize" type="button">{{$ot->day}}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group d-flex">
                                        <input class="form-control ordertimepicker" name="start_time[]" value="{{$ot->start_time}}" autocomplete="off" placeholder="Start Time">
                                        <button type="button" class="btn btn-sm btn-danger mt-1" onclick="event.target.previousElementSibling.value = ''">Clear</button>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group d-flex">
                                        <input class="form-control ordertimepicker" name="end_time[]" value="{{$ot->end_time}}" placeholder="End Time" autocomplete="off">
                                        <button type="button" class="btn btn-sm btn-danger mt-1" onclick="event.target.previousElementSibling.value = ''">Clear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <p class="mb-0 text-warning text-center" style="font-size: 16px;">If you do not take orders at a specific day, leave input fields blank for that day. </p>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="form">
              <div class="form-group from-show-notify row">
                <div class="col-12 text-center">
                  <button type="submit" id="displayNotif" class="btn btn-success">Update</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('scripts')
    <script>
        function toggleMessage(status) {
            if(status == 1) {
                $("#message").show();
            } else {
                $("#message").hide();
            }
        }

        $(document).ready(function() {
            $('.ordertimepicker').mdtimepicker();

            toggleMessage($("select[name='order_close']").val());

            $("select[name='order_close']").on('change', function() {
                let status = $(this).val();
                toggleMessage(status);
            });
        });
    </script>
@endsection
