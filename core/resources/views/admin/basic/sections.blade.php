@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Section Customization</h4>
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
        <a href="#">Section Customization</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <form class="" action="{{route('admin.sections.update', $lang_id)}}" method="post">
          @csrf
          <div class="card-header">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card-title">Customize Sections</div>
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
                  <label>Feature Section **</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="feature_section" value="1" class="selectgroup-input" {{$abs->feature_section == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="feature_section" value="0" class="selectgroup-input" {{$abs->feature_section == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>
                <div class="form-group">
                  <label>Introduction Section **</label>
                  <div class="selectgroup w-100">
                        <label class="selectgroup-item">
                            <input type="radio" name="intro_section" value="1" class="selectgroup-input" {{$abs->intro_section == 1 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Active</span>
                        </label>
                        <label class="selectgroup-item">
                            <input type="radio" name="intro_section" value="0" class="selectgroup-input" {{$abs->intro_section == 0 ? 'checked' : ''}}>
                            <span class="selectgroup-button">Deactive</span>
                        </label>
                    </div>
                </div>


                <div class="form-group">
                  <label>Menu Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="menu_section" value="1" class="selectgroup-input" {{$abs->menu_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="menu_section" value="0" class="selectgroup-input" {{$abs->menu_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Special Food Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="special_section" value="1" class="selectgroup-input" {{$abs->special_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="special_section" value="0" class="selectgroup-input" {{$abs->special_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>

                <div class="form-group">
                  <label>Team Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="team_section" value="1" class="selectgroup-input" {{$abs->team_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="team_section" value="0" class="selectgroup-input" {{$abs->team_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>

                <div class="form-group">
                  <label>Testimonial Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="testimonial_section" value="1" class="selectgroup-input" {{$abs->testimonial_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="testimonial_section" value="0" class="selectgroup-input" {{$abs->testimonial_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>

                <div class="form-group">
                  <label>News Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="news_section" value="1" class="selectgroup-input" {{$abs->news_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="news_section" value="0" class="selectgroup-input" {{$abs->news_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>

                <div class="form-group">
                  <label>Book a Table Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="table_section" value="1" class="selectgroup-input" {{$abs->table_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="table_section" value="0" class="selectgroup-input" {{$abs->table_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>

                <div class="form-group">
                  <label>Top Footer Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="top_footer_section" value="1" class="selectgroup-input" {{$abs->top_footer_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="top_footer_section" value="0" class="selectgroup-input" {{$abs->top_footer_section == 0 ? 'checked' : ''}}>
											<span class="selectgroup-button">Deactive</span>
										</label>
									</div>
                </div>
                <div class="form-group">
                  <label>Copyright Section **</label>
                  <div class="selectgroup w-100">
										<label class="selectgroup-item">
											<input type="radio" name="copyright_section" value="1" class="selectgroup-input" {{$abs->copyright_section == 1 ? 'checked' : ''}}>
											<span class="selectgroup-button">Active</span>
										</label>
										<label class="selectgroup-item">
											<input type="radio" name="copyright_section" value="0" class="selectgroup-input" {{$abs->copyright_section == 0 ? 'checked' : ''}}>
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
