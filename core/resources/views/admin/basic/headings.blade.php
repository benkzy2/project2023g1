@extends('admin.layout')

@if(!empty($abs->language) && $abs->language->rtl == 1)
@section('styles')
<style>
    form input,
    form textarea,
    form select {
        direction: rtl;
    }
    form .note-editor.note-frame .note-editing-area .note-editable {
        direction: rtl;
        text-align: right;
    }
</style>
@endsection
@endif

@section('content')
  <div class="page-header">
    <h4 class="page-title">Page Headings</h4>
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
        <a href="#">Page Headings</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.heading.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
              <div class="row">
                  <div class="col-lg-10">
                      <div class="card-title">Update Page Headings</div>
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
          <div class="card-body pt-5 pb-5">
            <div class="row">
              <div class="col-lg-6 offset-lg-3">
                @csrf
                <div class="form-group">
                  <label>Menu Title **</label>
                  <input class="form-control" name="menu_title" value="{{$abs->menu_title}}">
                  @if ($errors->has('menu_title'))
                    <p class="mb-0 text-danger">{{$errors->first('menu_title')}}</p>
                  @endif
                </div>
              
                <div class="form-group">
                  <label>Items Title **</label>
                  <input class="form-control" name="items_title" value="{{$abs->items_title}}">
                  @if ($errors->has('items_title'))
                    <p class="mb-0 text-danger">{{$errors->first('items_title')}}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label>Menu / Item Details Title **</label>
                  <input class="form-control" name="menu_details_title" value="{{$abs->menu_details_title}}">
                  @if ($errors->has('menu_details_title'))
                    <p class="mb-0 text-danger">{{$errors->first('menu_details_title')}}</p>
                  @endif
                </div>
            
                <div class="form-group">
                  <label>Cart Title **</label>
                  <input class="form-control" name="cart_title" value="{{$abs->cart_title}}">
                  @if ($errors->has('cart_title'))
                    <p class="mb-0 text-danger">{{$errors->first('cart_title')}}</p>
                  @endif
                </div>
                
                <div class="form-group">
                  <label>Checkout Title **</label>
                  <input class="form-control" name="checkout_title" value="{{$abs->checkout_title}}">
                  @if ($errors->has('checkout_title'))
                    <p class="mb-0 text-danger">{{$errors->first('checkout_title')}}</p>
                  @endif
                </div>
            

                <div class="form-group">
                  <label>Blog Title **</label>
                  <input class="form-control" name="blog_title" value="{{$abs->blog_title}}">
                  @if ($errors->has('blog_title'))
                    <p class="mb-0 text-danger">{{$errors->first('blog_title')}}</p>
                  @endif
                </div>
              
                <div class="form-group">
                  <label>Blog Details Title **</label>
                  <input class="form-control" name="blog_details_title" value="{{$abs->blog_details_title}}">
                  @if ($errors->has('blog_details_title'))
                    <p class="mb-0 text-danger">{{$errors->first('blog_details_title')}}</p>
                  @endif
                </div>
                <div class="form-group">
                  <label>Gallery Title **</label>
                  <input class="form-control" name="gallery_title" value="{{$abs->gallery_title}}">
                  @if ($errors->has('gallery_title'))
                    <p class="mb-0 text-danger">{{$errors->first('gallery_title')}}</p>
                  @endif
                </div>

                <div class="form-group">
                  <label>Team Title **</label>
                  <input class="form-control" name="team_title" value="{{$abs->team_title}}">
                  @if ($errors->has('team_title'))
                    <p class="mb-0 text-danger">{{$errors->first('team_title')}}</p>
                  @endif
                </div>

                <div class="form-group">
                  <label>Reservation Title **</label>
                  <input class="form-control" name="reservation_title" value="{{$abs->reservation_title}}">
                  @if ($errors->has('reservation_title'))
                    <p class="mb-0 text-danger">{{$errors->first('reservation_title')}}</p>
                  @endif
                </div>
            
          
                <div class="form-group">
                  <label>Contact Title **</label>
                  <input class="form-control" name="contact_title" value="{{$abs->contact_title}}">
                  @if ($errors->has('contact_title'))
                    <p class="mb-0 text-danger">{{$errors->first('contact_title')}}</p>
                  @endif
                </div>
            
              
                <div class="form-group">
                  <label>Error Page Title **</label>
                  <input class="form-control" name="error_title" value="{{$abs->error_title}}">
                  @if ($errors->has('error_title'))
                    <p class="mb-0 text-danger">{{$errors->first('error_title')}}</p>
                  @endif
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
