@extends('admin.layout')

@if(!empty($data->language) && $data->language->rtl == 1)
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
    <h4 class="page-title">Edit Category</h4>
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
        <a href="#">Service Page</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Edit Category</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Edit Category</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.category.index') . '?language=' . request()->input('language')}}">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
              <form id="ajaxForm"  action="{{route('admin.category.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <div class="col-12 mb-2">
                        <label for="image"><strong>Image</strong></label>
                      </div>
                      <div class="col-md-12 showImage mb-3">
                        <img src="{{$data->image ? asset('assets/front/img/category/'.$data->image) : asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                      </div>
                      <input type="file" name="image" id="image" class="form-control image">
                      <p id="errimage" class="mb-0 text-danger em"></p>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="">Name **</label>
                  <input type="text" class="form-control" name="name" value="{{$data->name}}" placeholder="Enter name">
                  <p id="errname" class="mb-0 text-danger em"></p>
                </div>
                <input type="hidden" name="category_id" value="{{$data->id}}">

                <div class="form-group">
                  <label for="">Status **</label>
                  <select class="form-control ltr" name="status">
                    <option value="" selected disabled>Select a status</option>
                    <option value="1" {{$data->status ==1 ? 'selected' : ''}}>Active</option>
                    <option value="0" {{$data->status ==0 ? 'selected' : ''}}>Deactive</option>
                  </select>
                  <p id="errstatus" class="mb-0 text-danger em"></p>
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
