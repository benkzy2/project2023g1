@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Send Notification</h4>
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
        <a href="#">Push Notification</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Send Notification</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <form class="" action="{{route('admin.pushnotification.push')}}" method="post">
          @csrf
          <div class="card-header">
            <div class="card-title">Send Notification</div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 offset-lg-2">
                  <div class="form-group">
                    <label for="">Title **</label>
                    <input type="text" class="form-control" name="title" value="" placeholder="Enter title of Notification">
                    @if ($errors->has('title'))
                    <p class="text-danger mb-0">{{$errors->first('title')}}</p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="">Message</label>
                    <textarea name="message" class="form-control" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Button Text **</label>
                    <input type="text" class="form-control" name="button_text" value="" placeholder="Enter Button Text">
                    @if ($errors->has('button_text'))
                    <p class="text-danger mb-0">{{$errors->first('button_text')}}</p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label for="">Button URL **</label>
                    <input type="text" class="form-control" name="button_url" value="" placeholder="Enter Button URL">
                    @if ($errors->has('button_url'))
                    <p class="text-danger mb-0">{{$errors->first('button_url')}}</p>
                    @endif
                    <p class="mb-0 text-warning">Only those users will receive push notification, who have allowed it.</p>
                    <p class="text-warning mb-0">Push notification won't work for 'http', it needs 'https'</p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer text-center">
            <button type="submit" class="btn btn-success">
                <span class="btn-label">
                    <i class="fa fa-check"></i>
                </span>
                Send
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
