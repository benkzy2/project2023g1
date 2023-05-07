@extends('front.layout')

@section('content')
  <!--====== PAGE TITLE PART START ======-->


  <section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('Register')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Register')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== PAGE TITLE PART ENDS ======-->


<!--   hero area start    -->
<div class="login-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="login-content">
                    @if(Session::has('sendmail'))
                        <div class="alert alert-success mb-4">
                            <p>{{Session::get('sendmail')}}</p>
                        </div>
                    @endif
                    <div class="login-title">
                        <h3 class="title">{{__('Register')}}</h3>
                    </div>
                    <form action="{{route('user-register-submit')}}" method="POST">@csrf
                        <div class="input-box">
                            <span>{{__('Username')}} *</span>
                            <input type="text" name="username" value="{{Request::old('username')}}">
                            @if ($errors->has('username'))
                            <p class="text-danger mb-0 mt-2">{{$errors->first('username')}}</p>
                            @endif
                        </div>
                        <div class="input-box">
                            <span>{{__('Email Address')}} *</span>
                            <input type="email" name="email" value="{{Request::old('email')}}">
                            @if ($errors->has('email'))
                            <p class="text-danger mb-0 mt-2">{{$errors->first('email')}}</p>
                            @endif
                        </div>
                        <div class="input-box">
                            <span>{{__('Password')}} *</span>
                            <input type="password" name="password" value="{{Request::old('password')}}">
                            @if ($errors->has('password'))
                            <p class="text-danger mb-0 mt-2">{{$errors->first('password')}}</p>
                            @endif
                        </div>
                        <div class="input-box mb-4">
                            <span>{{__('Confirmation Password')}} *</span>
                            <input type="password" name="password_confirmation" value="{{Request::old('password_confirmation')}}">
                            @if ($errors->has('password_confirmation'))
                            <p class="text-danger mb-0 mt-2">{{$errors->first('password_confirmation')}}</p>
                            @endif
                        </div>

                    @if ($bs->is_recaptcha == 1)
                    <div class="d-block mb-4">
                        <div data-sitekey="{{$bs->google_recaptcha_site_key}}" class="g-recaptcha d-inline-block"></div>
                        @if ($errors->has('g-recaptcha-response'))
                        @php
                            $errmsg = $errors->first('g-recaptcha-response');
                        @endphp
                        <p class="text-danger mb-0 mt-2">{{__("$errmsg")}}</p>
                        @endif
                    </div>
                @endif
                        <div class="input-btn">
                            <button type="submit" class="main-btn">{{__('Register')}}</button><br>
                            <p>{{__('Already have an account ?')}} <a class="mr-3" href="{{route('user.login')}}">{{__('Click Here')}}</a> {{__('To login')}}.</p>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   hero area end    -->
@endsection
