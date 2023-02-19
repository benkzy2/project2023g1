@extends('admin.layout')
@section('content')
<div class="page-header">
   <h4 class="page-title">Create Product</h4>
   <ul class="breadcrumbs">
      <li class="nav-home">
         <a href="#">
         <i class="flaticon-home"></i>
         </a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Product Page</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Create Product</a>
      </li>
   </ul>
</div>
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-header">
            <div class="card-title d-inline-block">Create Product</div>
            <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.product.index') . '?language=' . request()->input('language')}}">
            <span class="btn-label">
            <i class="fas fa-backward"></i>
            </span>
            Back
            </a>
         </div>
         <div class="card-body pt-5 pb-5">
            <div class="row">
               <div class="col-lg-6 offset-lg-3">
                  {{-- Slider images upload start --}}
                  <div class="px-2">
                     <label for="" class="mb-2"><strong>Slider Images **</strong></label>
                     <form action="{{route('admin.product.sliderstore')}}" id="my-dropzone" enctype="multipart/formdata" class="dropzone create">
                        @csrf
                        <div class="fallback">
                           <input name="file" type="file" multiple  />
                        </div>
                     </form>
                     <p class="em text-danger mb-0" id="errslider_images"></p>
                  </div>

                  {{-- Featured image upload end --}}
                  <form id="ajaxForm" class="" action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                     @csrf
                     <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <div class="col-12 mb-2">
                              <label for="image"><strong>Featured Image</strong></label>
                            </div>
                            <div class="col-md-12 showImage mb-3">
                              <img src="{{asset('assets/admin/img/noimage.jpg')}}" alt="..." class="img-thumbnail">
                            </div>
                            <input type="file" name="feature_image" id="image" class="form-control image">
                            <p id="errfeature_image" class="mb-0 text-danger em"></p>
                          </div>
                        </div>
                      </div>
                     <div id="sliders"></div>
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Language **</label>
                              <select id="language" name="language_id" class="form-control">
                                 <option value="" selected disabled>Select a language</option>
                                 @foreach ($langs as $lang)
                                 <option value="{{$lang->id}}">{{$lang->name}}</option>
                                 @endforeach
                              </select>
                              <p id="errlanguage_id" class="mb-0 text-danger em"></p>
                           </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                               <label for="">Status **</label>
                               <select class="form-control " name="status">
                                  <option value="" selected disabled>Select a status</option>
                                  <option value="1">Show</option>
                                  <option value="0">Hide</option>
                               </select>
                               <p id="errstatus" class="mb-0 text-danger em"></p>
                            </div>
                         </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Title **</label>
                              <input type="text" class="form-control" name="title" value="" placeholder="Enter title">
                              <p id="errtitle" class="mb-0 text-danger em"></p>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                               <label for="category">Category **</label>
                               <select  class="form-control categoryData" name="category_id" id="category">
                                  <option value="" selected disabled>Select a category</option>
                                  @foreach ($categories as $categroy)
                                  <option value="{{$categroy->id}}">{{$categroy->name}}</option>
                                  @endforeach
                               </select>
                               <p id="errcategory_id" class="mb-0 text-danger em"></p>
                            </div>
                         </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Stock Product **</label>
                              <input type="number" class="form-control ltr" name="stock" value="" placeholder="Enter Product Stock">
                              <p id="errstock" class="mb-0 text-danger em"></p>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for=""> Current Price ({{$be->base_currency_text}})**</label>
                              <input type="number" class="form-control ltr" name="current_price" value=""  placeholder="Enter Current Price">
                              <p id="errcurrent_price" class="mb-0 text-danger em"></p>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="form-group">
                              <label for="">Previous Price ({{$be->base_currency_text}})</label>
                              <input type="number" class="form-control ltr" name="previous_price" value="" placeholder="Enter Previous Price">
                              <p id="errprevious_price" class="mb-0 text-danger em"></p>
                           </div>
                        </div>
                     </div>

                     <div class="row">

                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="summary">Summary **</label>
                              <textarea name="summary" id="summary" class="form-control" rows="4" placeholder="Enter Product Summary"></textarea>
                              <p id="errsummary" class="mb-0 text-danger em"></p>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label for="">Description **</label>
                              <textarea class="form-control summernote" name="description" placeholder="Enter description" data-height="300"></textarea>
                              <p id="errdescription" class="mb-0 text-danger em"></p>
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
                     <button type="submit" id="submitBtn" class="btn btn-success">Submit</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('variables')
<script>
    "use strict";
    var storeUrl = "{{route('admin.product.sliderstore')}}";
    var removeUrl = "{{route('admin.product.sliderrmv')}}";
</script>
@endsection
