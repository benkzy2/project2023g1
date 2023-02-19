@extends('front.layout')

@section('content')

<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('Reset Password')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('user-dashboard')}}"><i class="flaticon-home"></i>{{__('Dashboard')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Reset Password')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== CHECKOUT PART START ======-->
<section class="user-dashbord">
    <div class="container">
        <div class="row">
            @include('user.inc.site_bar')
            <div class="col-lg-9">
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="user-profile-details">
                            <div class="account-info">
                                <div class="title">
                                    <h4>{{__('Reset Password')}}</h4>
                                </div>
                                <div class="edit-info-area">
                                    <form action="{{route('user-reset-submit')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="password" class="form_control" placeholder="{{__('Current Password')}}" name="current_password">
                                                @error('current_password')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="password" class="form_control" placeholder="{{__('New Password')}}" name="new_password" >
                                                @error('new_password')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <input type="password" class="form_control" placeholder="{{__('Re-Type Password')}}" name="confirmation_password" >
                                                @error('confirmation_password')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-button">
                                                    <button class="btn form-btn">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
