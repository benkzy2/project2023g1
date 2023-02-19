@extends('admin.layout')

@if(!empty($slider->language) && $slider->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select {
        direction: rtl;
    }
    .nicEdit-main {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
  <div class="page-header">
    <h4 class="page-title">Edit Slider</h4>
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
        <a href="#">Home Page</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Hero Section</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Edit Slider</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Edit Slider</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.slider.index') . '?language=' . request()->input('language')}}">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">

              <form id="ajaxForm" class="" action="{{route('admin.slider.update')}}" method="post">
                @csrf
                <input type="hidden" name="slider_id" value="{{$slider->id}}">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <div class="col-12 mb-2">
                        <label for="image"><strong>Slider Image</strong></label>
                      </div>
                      <div class="col-md-12 showImage mb-3">
                        <img src="{{ $slider->image ? asset('assets/front/img/sliders/'.$slider->image) : asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                      </div>
                      <input type="file" name="main_image" id="image" class="form-control image">
                      <p id="errmain_image" class="mb-0 text-danger em"></p>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <div class="col-12 mb-2">
                        <label for="image"><strong> Backgraound Image</strong></label>
                      </div>
                      <div class="col-md-12 bg_image mb-3">
                        <img src="{{ $slider->bg_image ? asset('assets/front/img/sliders/bg_image/'.$slider->bg_image) : asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                      </div>
                      <input type="file" name="bg_image" id="bg_image" class="form-control image">
                      <p id="errbg_image" class="mb-0 text-danger em"></p>
                    </div>
                  </div>
                </div>


                <div class="form-group">
                  <label for="">Title **</label>
                  <input type="text" class="form-control" name="title" value="{{$slider->title}}" placeholder="Enter Title">
                  <p id="errtitle" class="text-danger mb-0 em"></p>
                </div>
                <div class="form-group">
                  <label>Title Color Code **</label>
                  <input class="jscolor form-control ltr" name="title_color" value="{{$slider->title_color}}">
                  <p id="title_color" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label for="">Text **</label>
                  <input type="text" class="form-control" name="text" value="{{$slider->text}}" placeholder="Enter Text">
                  <p id="errtext" class="text-danger mb-0 em"></p>
                </div>
                <div class="form-group">
                  <label>Text Color Code **</label>
                  <input class="jscolor form-control ltr" name="text_color" value="{{$slider->text_color}}">
                  <p id="text_color" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label for="">Button Text 1</label>
                  <input type="text" class="form-control" name="button_text" value="{{$slider->button_text}}" placeholder="Enter Button Text">
                  <p id="errbutton_text" class="text-danger mb-0 em"></p>
                </div>
                <div class="form-group">
                  <label for="">Button URL 1</label>
                  <input type="text" class="form-control ltr" name="button_url" value="{{$slider->button_url}}" placeholder="Enter Button URL">
                  <p id="errbutton_url" class="text-danger mb-0 em"></p>
                </div>
                <div class="form-group">
                  <label for="">Button Text 2</label>
                  <input type="text" class="form-control" name="button_text1" value="{{$slider->button_text1}}" placeholder="Enter Button Text">
                  <p id="errbutton_text1" class="text-danger mb-0 em"></p>
                </div>
                <div class="form-group">
                  <label for="">Button URL 2</label>
                  <input type="text" class="form-control ltr" name="button_url1" value="{{$slider->button_url1}}" placeholder="Enter Button URL">
                  <p id="errbutton_url1" class="text-danger mb-0 em"></p>
                </div>
                <div class="form-group">
                  <label>Button Color Code **</label>
                  <input class="jscolor form-control ltr" name="button_color" value="{{$slider->button_color}}">
                  <p id="button_color" class="mb-0 text-danger em"></p>
                </div>

                <div class="form-group">
                  <label for="">Serial Number **</label>
                  <input type="number" class="form-control ltr" name="serial_number" value="{{$slider->serial_number}}" placeholder="Enter Serial Number">
                  <p id="errserial_number" class="mb-0 text-danger em"></p>
                  <p class="text-warning"><small>The higher the serial number is, the later the slider will be shown.</small></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection


