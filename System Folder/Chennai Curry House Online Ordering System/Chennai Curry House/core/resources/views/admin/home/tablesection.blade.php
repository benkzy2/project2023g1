@extends('admin.layout')

@if(!empty($abe->language) && $abe->language->rtl == 1)
@section('styles')
<style>
    form:not(.modal-form) input,
    form:not(.modal-form) textarea,
    form:not(.modal-form) select,
    select[name='language'] {
        direction: rtl;
    }
    form:not(.modal-form) .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
  <div class="page-header">
    <h4 class="page-title">Text & Image</h4>
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
        <a href="#">Reservation Settings</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Text & Image</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">Update Text & Image</div>
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
        <div class="card-body pt-5 pb-4">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">

              <form id="ajaxForm" action="{{route('admin.tablesection.update', $lang_id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <div class="mb-2">
                        <label for="image"><strong> Backgroud Image </strong></label>
                      </div>
                      <div class="showImage mb-3">
                        @if (!empty($abe->table_section_img))
                          <a class="remove-image" data-type="table_background"><i class="far fa-times-circle"></i></a>
                        @endif
                        <img src="{{ !empty($abe->table_section_img) ? asset('assets/front/img/'.$abe->table_section_img) : asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                      </div>
                      <input type="file" name="table_section_img" id="image" class="form-control image">
                      <p id="errtable_section_img" class="mb-0 text-danger em"></p>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Title **</label>
                  <input name="table_section_title" class="form-control" value="{{$abe->table_section_title}}">
                  <p id="errtable_section_title" class="em text-danger mb-0"></p>
                </div>
                <div class="form-group">
                  <label for="">Subtitle **</label>
                  <input name="table_section_subtitle" class="form-control" value="{{$abe->table_section_subtitle}}">
                  <p id="errtable_section_subtitle" class="em text-danger mb-0"></p>
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
            url: "{{route('admin.tablesection.rmv.img')}}",
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
