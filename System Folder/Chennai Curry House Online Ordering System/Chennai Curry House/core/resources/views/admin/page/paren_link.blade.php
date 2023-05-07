@extends('admin.layout')

@php
$selLang = \App\Models\Language::where('code', request()->input('language'))->first();
@endphp
@if(!empty($selLang) && $selLang->rtl == 1)
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
    <h4 class="page-title">Pages Parent Link</h4>
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
        <a href="#">Pages Parent Link</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
              <div class="col-lg-4">
                  <div class="card-title d-inline-block">Pages Parent Link</div>
              </div>
              <div class="col-lg-3">
                @if (!empty($langs))
                    <select name="language" class="form-control" onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                        <option value="" selected disabled>Select a Language</option>
                        @foreach ($langs as $lang)
                            <option value="{{$lang->code}}" {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}</option>
                        @endforeach
                    </select>
                @endif
              </div>
              <div class="offset-lg-1 col-lg-4">
                  <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.dashboard') . '?language=' . request()->input('language')}}">
                        <span class="btn-label">
                            <i class="fas fa-backward"></i>
                        </span>
                        Back
                  </a>
              </div>
          </div>
        </div>
        <div class="card-body pt-5 pb-4">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="ajaxForm" action="{{route('admin.page.parent.link.update')}}" method="post">
                @csrf

                <div class="row">
                  <div class="col-lg-12">
                    <input type="hidden" name="language_id" value="{{$lang_id}}">
                    <div class="form-group">
                      <label for="">Link Title **</label>
                      <input type="text" name="link" class="form-control" placeholder="Enter parent link" value="{{$abs->pages_p_link}}">
                      <p id="errlink" class="em text-danger mb-0"></p>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">Save</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
