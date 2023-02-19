@extends('front.layout')

@section('content')

<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('My Profile')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{__('My Profile')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--   hero area end    -->
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
                                        <h4>{{__('Edit Profile')}}</h4>
                                    </div>
                                    <div class="edit-info-area">
                                        <form action="{{route('user-profile-update')}}" method="POST" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="upload-img">
                                                <div class="img-box">
                                                    <img class="showimage" src="{{$user->photo ? asset('assets/front/img/user/'.$user->photo) : asset('assets/front/img/user/profile.jpg')}}" alt="user-image">
                                                </div>
                                                <div class="file-upload-area">
                                                    <div class="upload-file">
                                                        <input type="file" name="photo" class="upload image">
                                                        <span>{{__('Upload')}}</span>
                                                    </div>
                                                    @error('photo')
                                                        <p class="text-danger" >{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('First Name')}}" name="fname" value="{{$user->fname}}" value="{{Request::old('fname')}}">
                                                    @error('fname')
                                                        <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('Last Name')}}" name="lname" value="{{$user->lname}}" value="{{Request::old('lname')}}">
                                                    @error('lname')
                                                        <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="email" class="form_control" placeholder="{{__('Email')}}" name="email" disabled value="{{$user->email}}" value="{{Request::old('email')}}">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('Username')}}" name="username" value="{{$user->username}}" value="{{Request::old('username')}}">
                                                    @error('username')
                                                    <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('Phone')}}" name="number" value="{{$user->number}}" value="{{Request::old('number')}}">
                                                    @error('number')
                                                    <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('City')}}" name="city" value="{{$user->city}}" value="{{Request::old('city')}}">
                                                    @error('city')
                                                    <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('State')}}" name="state" value="{{$user->state}}" value="{{Request::old('state')}}">
                                                    @error('state')
                                                    <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form_control" placeholder="{{__('Country')}}" name="country" value="{{$user->country}}" value="{{Request::old('country')}}">
                                                    @error('country')
                                                    <p class="text-danger mb-2">{{ $message }}</p>
                                                    @enderror
                                                </div>


                                                <div class="col-lg-12">
                                                    <textarea name="address" class="form_control" placeholder="{{__('Address')}}">{{$user->address}}</textarea>
                                                    @error('address')
                                                    <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-button">
                                                        <button type="submit" class="btn form-btn">{{__('Submit')}}</button>
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
