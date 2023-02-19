@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Scripts</h4>
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
        <a href="#">Basic Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Scripts</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.script.update')}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">Update Scripts</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                @csrf
                <div class="form-group">
                  <label>Google Recaptcha Status</label>
                  <div class="selectgroup w-100">
                    <label class="selectgroup-item">
                      <input type="radio" name="is_recaptcha" value="1" class="selectgroup-input" {{$bs->is_recaptcha == 1 ? 'checked' : ''}}>
                      <span class="selectgroup-button">Active</span>
                    </label>
                    <label class="selectgroup-item">
                      <input type="radio" name="is_recaptcha" value="0" class="selectgroup-input" {{$bs->is_recaptcha == 0 ? 'checked' : ''}}>
                      <span class="selectgroup-button">Deactive</span>
                    </label>
                  </div>
                  @if ($errors->has('is_recaptcha'))
                    <p class="mb-0 text-danger">{{$errors->first('is_recaptcha')}}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label>Google Recaptcha Site key</label>
                  <input class="form-control" name="google_recaptcha_site_key" value="{{$bs->google_recaptcha_site_key}}">
                  @if ($errors->has('google_recaptcha_site_key'))
                    <p class="mb-0 text-danger">{{$errors->first('google_recaptcha_site_key')}}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label>Google Recaptcha Secret key</label>
                  <input class="form-control" name="google_recaptcha_secret_key" value="{{$bs->google_recaptcha_secret_key}}">
                  @if ($errors->has('google_recaptcha_secret_key'))
                    <p class="mb-0 text-danger">{{$errors->first('google_recaptcha_secret_key')}}</p>
                  @endif
                </div>
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
