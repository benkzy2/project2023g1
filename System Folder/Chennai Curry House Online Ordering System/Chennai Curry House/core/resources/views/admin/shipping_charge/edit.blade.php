@extends('admin.layout')
@php
    $langs = \App\Models\Language::all();
@endphp
@if(!empty($scategory->language) && $scategory->language->rtl == 1)
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
    <h4 class="page-title">Edit Shipping Charge</h4>
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
        <a href="#">Order Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Shipping Charges</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Edit</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Edit Shipping Charge</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.shipping.index') . '?language=' . request()->input('language')}}">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">


          <form id="ajaxForm" class="modal-form" action="{{route('admin.shipping.update')}}" method="POST">
            @csrf
          <input type="hidden" value="{{$shipping->id}}" name="shipping_id">
            <div class="form-group">
                <label for="">Language **</label>
                <select name="language_id" class="form-control">
                    <option value="" selected disabled>Select a language</option>
                    @foreach ($langs ?? '' as $lang)
                        <option value="{{$lang->id}}" {{$shipping->language_id == $lang->id ? 'selected' : ''}}>{{$lang->name}}</option>
                    @endforeach
                </select>
                <p id="errlanguage_id" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">Title **</label>
              <input type="text" class="form-control" name="title" value="{{$shipping->title}}" placeholder="Enter title">
              <p id="errtitle" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">Short Text **</label>
              <input type="text" class="form-control" name="text" value="{{$shipping->text}}" placeholder="Enter text">
            </div>

            <div class="form-group">
              <label for="">Charge ({{$be->base_currency_text}}) **</label>
              <input type="text" class="form-control" name="charge" value="{{$shipping->charge}}" placeholder="Enter charge">
              <p id="errcharge" class="mb-0 text-danger em"></p>
            </div>
            <div class="form-group">
              <label for="">Minimum Order Amount For Free Delivery ({{$be->base_currency_text}})</label>
              <input type="text" class="form-control ltr" name="free_delivery_amount" value="{{$shipping->free_delivery_amount}}" placeholder="Enter Minimum Order Amount For Free Delivery">
              <p class="mb-0 text-warning">If dont want 'Free Delivery' , then please leave it blank</p>
              <p id="errfree_delivery_amount" class="mb-0 text-danger em"></p>
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
