@extends('front.qrmenu.layout')

@section('page-heading')
    {{__('Login')}}
@endsection

@section('content')
<div class="login-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <a href="{{route('front.qrmenu.checkout', ['type' => 'guest'])}}" class="btn btn-block btn-primary mb-4 base-btn py-3">{{__('Checkout as Guest')}}</a>

                <div class="mt-4 mb-3 text-center">
                    <h3 class="mb-0"><strong>{{__('OR')}},</strong></h3>
                </div>

                <div class="login-content">
                    @if ($be->is_facebook_login == 1 || $be->is_google_login == 1)
                    <div class="social-logins mt-4 mb-4">
                        <div class="btn-group btn-group-toggle d-flex">
                            @if ($be->is_facebook_login == 1)
                            <a class="btn btn-primary text-white py-2 facebook" href="{{route('front.facebook.login')}}"><i class="fab fa-facebook-f mr-2"></i> {{__('Login via Facebook')}}</a>
                            @endif
                            @if ($be->is_google_login == 1)
                            <a class="btn btn-danger text-white py-2 google" href="{{route('front.google.login')}}"><i class="fab fa-google mr-2"></i> {{__('Login via Google')}}</a>
                            @endif
                        </div>
                    </div>
                    @endif
                    <div class="login-title">
                        <h3 class="title">{{__('Login')}}</h3>
                    </div>

                    <form id="loginForm" action="{{route('user.login')}}" method="POST">
                        @csrf
                        <div class="input-box">
                            <span>{{__('Email Address')}} *</span>
                            <input type="email" name="email" value="user@gmail.com">
                            @if(Session::has('err'))
                                <p class="text-danger mb-2 mt-2">{{Session::get('err')}}</p>
                            @endif
                            @error('email')
                            <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            <span>{{__('Password')}} *</span>
                            <input type="password" name="password" value="123456">
                            @error('password')
                            <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="input-box">
                            @if ($bs->is_recaptcha == 1)
                            <div class="d-block mb-4">
                                <div id="g-recaptcha" class="d-inline-block"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                @php
                                    $errmsg = $errors->first('g-recaptcha-response');
                                @endphp
                                <p class="text-danger mb-0 mt-2">{{__("$errmsg")}}</p>
                                @endif
                            </div>
                        @endif
                        </div>

                        <div class="input-btn">
                            <button type="submit" class="main-btn">{{__('LOG IN')}}</button>
                            {{-- <div class="mt-2 d-flex justify-content-between">
                                <a href="{{route('user-register')}}" class="mr-3">{{__("Don't have an account")}}?</a>
                                <a href="{{route('user-forgot')}}">{{__('Lost your password')}}?</a>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
