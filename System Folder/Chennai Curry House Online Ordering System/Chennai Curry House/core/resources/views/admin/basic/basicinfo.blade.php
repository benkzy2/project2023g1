@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">General Settings</h4>
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
        <a href="#">General Settings</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.basicinfo.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-12">
                      <div class="card-title">Update General Settings</div>
                  </div>
              </div>
          </div>
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                @csrf
                <div class="form-group">
                  <h3 class="text-warning">Information</h3>
                  <hr style="border-top: 1px solid #ffffff1a;"><br>

                  <label>Website Title **</label>
                  <input class="form-control" name="website_title" value="{{$abs->website_title}}">
                  @if ($errors->has('website_title'))
                    <p class="mb-0 text-danger">{{$errors->first('website_title')}}</p>
                  @endif
                </div>

                <div class="form-group">
                  <label>Office Time **</label>
                  <input class="form-control" name="office_time" value="{{$bs->office_time}}" placeholder="Office Time">
                  @if ($errors->has('office_time'))
                    <p class="mb-0 text-danger">{{$errors->first('office_time')}}</p>
                  @endif
                </div>

                <div class="form-group">
                    <label for="">Timezone</label>
                    <select class="form-control select2" name="timezone">
                        <option value="" selected disabled>Select a Timezone</option>
                        @foreach ($timezones as $timezone)
                        <option value="{{$timezone->timezone}}" {{$be->timezone == $timezone->timezone ? 'selected' : ''}}>{{$timezone->timezone}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <br>
                  <h3 class="text-warning">Website Appearance</h3>
                  <hr style="border-top: 1px solid #ffffff1a;"><br>

                  <label>Base Color Code **</label>
                  <input class="jscolor form-control ltr" name="base_color" value="{{$abs->base_color}}">
                  @if ($errors->has('base_color'))
                    <p class="mb-0 text-danger">{{$errors->first('base_color')}}</p>
                  @endif

                </div>

                <div class="form-group">
                    <label>Home Version **</label>
                    <select name="home_version" class="form-control">
                        <option value="static" {{$abs->home_version == 'static' ? 'selected' : ''}}>Static Version</option>
                        <option value="slider" {{$abs->home_version == 'slider' ? 'selected' : ''}}>Slider Version</option>
                        <option value="video" {{$abs->home_version == 'video' ? 'selected' : ''}}>Video Version</option>
                        <option value="particles" {{$abs->home_version == 'particles' ? 'selected' : ''}}>Particles Version</option>
                        <option value="water" {{$abs->home_version == 'water' ? 'selected' : ''}}>Water Version</option>
                        <option value="parallax" {{$abs->home_version == 'parallax' ? 'selected' : ''}}>Parallax Version</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <br>
                            <h3 class="text-warning">Currency Settings</h3>
                            <hr style="border-top: 1px solid #ffffff1a;">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">

                            <label>Base Currency Symbol **</label>
                            <input type="text" class="form-control ltr" name="base_currency_symbol" value="{{$abe->base_currency_symbol}}">
                            @if ($errors->has('base_currency_symbol'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_symbol')}}</p>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Base Currency Symbol Position **</label>
                            <select name="base_currency_symbol_position" class="form-control ltr">
                                <option value="left" {{$abe->base_currency_symbol_position == 'left' ? 'selected' : ''}}>Left</option>
                                <option value="right" {{$abe->base_currency_symbol_position == 'right' ? 'selected' : ''}}>Right</option>
                            </select>
                            @if ($errors->has('base_currency_symbol_position'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_symbol_position')}}</p>
                            @endif
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Base Currency Text **</label>
                            <input type="text" class="form-control ltr" name="base_currency_text" value="{{$abe->base_currency_text}}">
                            @if ($errors->has('base_currency_text'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_text')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Base Currency Text Position **</label>
                            <select name="base_currency_text_position" class="form-control ltr">
                                <option value="left" {{$abe->base_currency_text_position == 'left' ? 'selected' : ''}}>Left</option>
                                <option value="right" {{$abe->base_currency_text_position == 'right' ? 'selected' : ''}}>Right</option>
                            </select>
                            @if ($errors->has('base_currency_text_position'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_text_position')}}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Base Currency Rate **</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                  <span class="input-group-text">1 USD =</span>
                                </div>
                                <input type="text" name="base_currency_rate" class="form-control ltr" value="{{$abe->base_currency_rate}}">
                                <div class="input-group-append">
                                  <span class="input-group-text">{{$abe->base_currency_text}}</span>
                                </div>
                            </div>

                            @if ($errors->has('base_currency_rate'))
                              <p class="mb-0 text-danger">{{$errors->first('base_currency_rate')}}</p>
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
