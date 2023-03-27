@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Sliders</h4>
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
        <a href="#">Website Pages</a>
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
        <a href="#">Sliders</a>
      </li>
    </ul>
  </div>

  <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card-title">Images</div>
                    </div>
                    <div class="col-lg-2">
                        @if (!empty($langs))
                            <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                                <option value="" selected disabled>Select a Language</option>
                                @foreach ($langs as $lang)
                                    <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
            </div>
            <form class="" action="{{route('admin.slider.image.update', $lang_id)}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="mb-2">
                        <label for="image"><strong> Shape Image</strong></label>
                      </div>
                      <div class="showImage mb-3">
                        @if (!empty($abe->slider_shape_img))
                        <a class="remove-image" data-type="shape"><i class="far fa-times-circle"></i></a>
                        @endif
                        <img src="{{ !empty($abe->slider_shape_img) ? asset('assets/front/img/'.$abe->slider_shape_img) : asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail w-100">
                      </div>
                      <input type="file" name="slider_shape_img" class="form-control image">
                      <p id="errslider_shape_img" class="mb-0 text-danger em"></p>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="mb-2">
                        <label for="image"><strong> Bottom Image</strong></label>
                      </div>
                      <div class="showImage mb-3">
                        @if (!empty($abe->slider_bottom_img))
                        <a class="remove-image" data-type="bottom"><i class="far fa-times-circle"></i></a>
                        @endif
                        <img src="{{ $abe->slider_bottom_img ? asset('assets/front/img/'.$abe->slider_bottom_img) : asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail w-100">
                      </div>
                      <input type="file" name="slider_bottom_img" class="form-control image">
                      <p id="errslider_bottom_img" class="mb-0 text-danger em"></p>
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

  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-title d-inline-block">Sliders</div>
                </div>
                <div class="col-lg-4 offset-lg-4 mt-2 mt-lg-0">
                    <a href="#" class="btn btn-primary float-lg-right float-left" data-toggle="modal" data-target="#createModal"><i class="fas fa-plus"></i> Add Slider</a>
                </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              @if (count($sliders) == 0)
                <h3 class="text-center">NO SLIDER FOUND</h3>
              @else
                <div class="row">
                  @foreach ($sliders as $key => $slider)
                    <div class="col-md-3">
                      <div class="card">
                            <div class="card-body">
                                <img class="w-100" src="{{asset('assets/front/img/sliders/'.$slider->image)}}" alt="">
                            </div>
        								<div class="card-footer text-center">
                          <a class="btn btn-secondary btn-sm mr-2" href="{{route('admin.slider.edit', $slider->id) . '?language=' . request()->input('language')}}">
                          <span class="btn-label">
                            <i class="fas fa-edit"></i>
                          </span>
                          Edit
                          </a>
                          <form class="deleteform d-inline-block" action="{{route('admin.slider.delete')}}" method="post">
                            @csrf
                            <input type="hidden" name="slider_id" value="{{$slider->id}}">
                            <button type="submit" class="btn btn-danger btn-sm deletebtn">
                              <span class="btn-label">
                                <i class="fas fa-trash"></i>
                              </span>
                              Delete
                            </button>
                          </form>
        								</div>
        							</div>
                    </div>
                  @endforeach
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Create Slider Modal -->
  <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add Slider</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="modal-form" id="ajaxForm" action="{{route('admin.slider.store')}}" method="post">
            @csrf

            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <div class="col-12 mb-2">
                    <label for="image"><strong>Slider Image</strong></label>
                  </div>
                  <div class="col-md-12 showImage mb-3">
                    <img src="{{ asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
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
                    <img src="{{ asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                  </div>
                  <input type="file" name="bg_image" id="bg_image" class="form-control image">
                  <p id="errbg_image" class="mb-0 text-danger em"></p>
                </div>
              </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Language **</label>
                        <select name="language_id" class="form-control">
                            <option value="" selected disabled>Select a language</option>
                            @foreach ($langs as $lang)
                                <option value="{{$lang->id}}">{{$lang->name}}</option>
                            @endforeach
                        </select>
                        <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Title **</label>
                      <input type="text" class="form-control" name="title" value="" placeholder="Enter Title">
                      <p id="errtitle" class="mb-0 text-danger em"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Title Font Size **</label>
                      <input type="number" class="form-control ltr" name="title_font_size" value="" placeholder="Enter Title Font Size">
                      <p id="errtitle_font_size" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                      <label>Title Color Code **</label>
                      <input class="jscolor form-control ltr" name="title_color" value="">
                      <p id="title_color" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Text **</label>
                      <input type="text" class="form-control" name="text" value="" placeholder="Enter Text">
                      <p id="errtext" class="mb-0 text-danger em"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="">Text Font Size **</label>
                        <input type="number" class="form-control ltr" name="text_font_size" value="" placeholder="Enter Text Font Size">
                        <p id="errtext_font_size" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                      <label>Text Color Code **</label>
                      <input class="jscolor form-control ltr" name="text_color" value="">
                      <p id="text_color" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Button 1 Text</label>
                      <input type="text" class="form-control" name="button_text" value="" placeholder="Enter Button Text">
                      <p id="errbutton_text" class="mb-0 text-danger em"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Button 1 Text Font Size **</label>
                      <input type="text" class="form-control ltr" name="button_text_font_size" value="" placeholder="Enter Button Text">
                      <p id="errbutton_text_font_size" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Button 1 URL</label>
                      <input type="text" class="form-control ltr" name="button_url" value="" placeholder="Enter Button URL">
                      <p id="errbutton_url" class="mb-0 text-danger em"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Button 1 Color Code **</label>
                        <input class="jscolor form-control ltr" name="button_color" value="">
                        <p id="button_color" class="mb-0 text-danger em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Button 2 Text</label>
                      <input type="text" class="form-control" name="button_text1"  placeholder="Enter Button Text">
                      <p id="errbutton_text1" class="text-danger mb-0 em"></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                      <label for="">Button 2 URL</label>
                      <input type="text" class="form-control ltr" name="button_url1"  placeholder="Enter Button URL">
                      <p id="errbutton_url1" class="text-danger mb-0 em"></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                      <label for="">Button 2 Text Font Size **</label>
                      <input type="text" class="form-control ltr" name="button_text1_font_size"  placeholder="Enter Button Text">
                      <p id="errbutton_text1_font_size" class="text-danger mb-0 em"></p>
                    </div>
                </div>
            </div>


            <div class="form-group">
              <label for="">Serial Number **</label>
              <input type="number" class="form-control ltr" name="serial_number" value="" placeholder="Enter Serial Number">
              <p id="errserial_number" class="mb-0 text-danger em"></p>
              <p class="text-warning"><small>The higher the serial number is, the later the slider will be shown.</small></p>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="submitBtn" type="button" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>
@endsection


@section('scripts')
<script>
$(function ($) {
  "use strict";

    $(".remove-image").on('click', function(e) {
        e.preventDefault();
        $(".request-loader").addClass("show");

        let type = $(this).data('type');
        let fd = new FormData();
        fd.append('type', type);
        fd.append('language_id', {{$abe->language->id}});

        $.ajax({
            url: "{{route('admin.slider.image.remove')}}",
            data: fd,
            type: 'POST',
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == "success") {
                    window.location = "{{url()->current() . '?language=' . $abe->language->code}}";
                }
            }
        })
    });
});
</script>
@endsection
