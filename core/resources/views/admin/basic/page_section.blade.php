@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Page Active/Deactivate</h4>
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
        <a href="#">Page Active/Deactivate</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.page.sections.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">Page Active/Deactivate</div>
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
                  <label>Items Page **</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="item_page" value="1" class="selectgroup-input" {{$abs->item_page == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="item_page" value="0" class="selectgroup-input" {{$abs->item_page == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>



                <div class="form-group">
                  <label>Menu Page 1 **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="menu_page" value="1" class="selectgroup-input" {{$abs->menu_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="menu_page" value="0" class="selectgroup-input" {{$abs->menu_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>

                <div class="form-group">
                  <label>Menu Page 2 **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="menu_page1" value="1" class="selectgroup-input" {{$abs->menu_page1 == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="menu_page1" value="0" class="selectgroup-input" {{$abs->menu_page1 == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Blog Page **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="blog_page" value="1" class="selectgroup-input" {{$abs->blog_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="blog_page" value="0" class="selectgroup-input" {{$abs->blog_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Cart Page **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="cart_page" value="1" class="selectgroup-input" {{$abs->cart_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="cart_page" value="0" class="selectgroup-input" {{$abs->cart_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Checkout Page **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="checkout_page" value="1" class="selectgroup-input" {{$abs->checkout_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="checkout_page" value="0" class="selectgroup-input" {{$abs->checkout_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Contact Page **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="contact_page" value="1" class="selectgroup-input" {{$abs->contact_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="contact_page" value="0" class="selectgroup-input" {{$abs->contact_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Gallery Page **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="gallery_page" value="1" class="selectgroup-input" {{$abs->gallery_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="gallery_page" value="0" class="selectgroup-input" {{$abs->gallery_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Team Page **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="team_page" value="1" class="selectgroup-input" {{$abs->team_page == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="team_page" value="0" class="selectgroup-input" {{$abs->team_page == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
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
