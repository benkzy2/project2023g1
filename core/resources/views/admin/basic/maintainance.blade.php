@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Maintanance Mode</h4>
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
        <a href="#">Maintanance Mode</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">

          <div class="card-header">
            <div class="card-title">Update Maintanance Page & Mode</div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                <form  action="{{route('admin.maintainance.update')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <div class="col-12 mb-2">
                          <label for="image"><strong>Maintainance Image **</strong></label>
                        </div>
                        <div class="col-md-12 showImage mb-3">
                          <img src="{{ asset('assets/front/img/'. 'maintainance.png') }}" alt="..." class="img-thumbnail">
                        </div>
                        <input type="file" name="file" id="image" class="form-control">
                        <p id="errfile" class="mb-0 text-danger em"></p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Maintanance Mode **</label>
                    <div class="selectgroup w-100">
                      <label class="selectgroup-item">
                        <input type="radio" name="maintainance_mode" value="1" class="selectgroup-input" {{$bs->maintainance_mode == 1 ? 'checked' : ''}}>
                        <span class="selectgroup-button">Active</span>
                      </label>
                      <label class="selectgroup-item">
                        <input type="radio" name="maintainance_mode" value="0" class="selectgroup-input" {{$bs->maintainance_mode == 0 ? 'checked' : ''}}>
                        <span class="selectgroup-button">Deactive</span>
                      </label>
                    </div>
                    @if ($errors->has('maintainance_mode'))
                      <p class="mb-0 text-danger">{{$errors->first('maintainance_mode')}}</p>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Maintanance Text</label>
                    <textarea class="form-control" name="maintainance_text" rows="3" cols="80">{{ replaceBaseUrl($bs->maintainance_text) }}</textarea>
                    @if ($errors->has('maintainance_text'))
                      <p class="mb-0 text-danger">{{$errors->first('maintainance_text')}}</p>
                    @endif
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
