@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Announcement Popup</h4>
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
        <a href="#">Announcement Popup</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">

          <div class="card-header">
            <div class="card-title">Update Announcement Popup Banner</div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <form  action="{{route('admin.announcement.update',$lang_id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <div class="col-12 mb-2">
                          <label for="image"><strong>Header Logo **</strong></label>
                        </div>
                        <div class="col-md-12 showImage mb-3">
                          <img src="{{ $bs->announcement ? asset('assets/front/img/' . $bs->announcement) : asset('assets/admin/img/noimage.jpg') }}" alt="..." class="img-thumbnail">
                        </div>
                        <input type="file" name="file" id="image" class="form-control">
                        <p id="errfile" class="mb-0 text-danger em"></p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Popup Delay (Second)</label>
                    <input class="form-control" type="text" name="announcement_delay" value="{{ ($bs->announcement_delay) }}">
                  </div>

                  <div class="form-group">
                    <label>Announcement Popup</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="is_announcement" value="1" class="selectgroup-input" {{$bs->is_announcement == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">Active</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="is_announcement" value="0" class="selectgroup-input" {{$bs->is_announcement == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">Deactive</span>
                      </label>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="form-group from-show-notify row">
                      <div class="col-12 text-center">
                        <button type="submit"  class="btn btn-success">Update</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        
      </div>
    </div>
  </div>

@endsection
