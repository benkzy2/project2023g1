@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">PWA Settings</h4>
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
        <a href="#">Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">PWA Settings</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.pwa.update')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">Update PWA Settings</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-10 offset-lg-1">
                @csrf

                <div class="row">
                  <div class="col-xl-4">
                    <div class="form-group">
                      <div class="col-12 mb-2">
                        <label for="image"><strong> Icon (128 X 128) **</strong></label>
                      </div>
                      <div class="col-md-12 showImage mb-3">
                        <img src="{{ asset($pwa['icons'][0]['src']) }}" alt="..." class="img-fluid">
                      </div>
                      <input type="file" name="icon_128" class="image form-control">
                      @if ($errors->has('icon_128'))
                        <p class="mb-0 text-danger">{{$errors->first('icon_128')}}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="form-group">
                      <div class="col-12 mb-2">
                        <label for="image"><strong> Icon (256 X 256) **</strong></label>
                      </div>
                      <div class="col-md-12 showImage mb-3">
                        <img src="{{ asset($pwa['icons'][1]['src']) }}" alt="..." class="img-fluid">
                      </div>
                      <input type="file" name="icon_256" class="image form-control">
                      @if ($errors->has('icon_256'))
                        <p class="mb-0 text-danger">{{$errors->first('icon_256')}}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-xl-4">
                    <div class="form-group">
                      <div class="col-12 mb-2">
                        <label for="image"><strong> Icon (512 X 512) **</strong></label>
                      </div>
                      <div class="col-md-12 showImage mb-3">
                        <img src="{{ asset($pwa['icons'][2]['src']) }}" alt="..." class="img-fluid">
                      </div>
                      <input type="file" name="icon_512" class="image form-control">
                      @if ($errors->has('icon_512'))
                        <p class="mb-0 text-danger">{{$errors->first('icon_512')}}</p>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-xl-6">
                    <div class="form-group">
    
                      <label>App Short Name **</label>
                      <input class="form-control" name="short_name" value="{{$pwa['short_name']}}">
                      @if ($errors->has('short_name'))
                        <p class="mb-0 text-danger">{{$errors->first('short_name')}}</p>
                      @endif
                    </div>
                  </div>
                  <div class="col-xl-6">
                    <div class="form-group">
                      <label>App Name**</label>
                      <input class="form-control" name="name"  value="{{$pwa['name']}}">
                      @if ($errors->has('name'))
                        <p class="mb-0 text-danger">{{$errors->first('name')}}</p>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
    
                      <label>Background Color **</label>
                      <input class="jscolor form-control ltr" name="background_color" value="{{$pwa['background_color']}}">
                      @if ($errors->has('background_color'))
                        <p class="mb-0 text-danger">{{$errors->first('background_color')}}</p>
                      @endif
    
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Theme Color **</label>
                      <input class="jscolor form-control ltr" name="theme_color" value="{{$pwa['theme_color']}}">
                      @if ($errors->has('theme_color'))
                        <p class="mb-0 text-danger">{{$errors->first('theme_color')}}</p>
                      @endif
    
                    </div>
                  </div>
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
