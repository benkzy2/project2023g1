@extends('front.layout')

@section('content')
<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('Forgot Password')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{('Forgot Password')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!--   hero area start    -->
<div class="login-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="login-content">
                    <div class="login-title">
                        <h3 class="title">{{__('Forgot Password')}}</h3>
                    </div>

                    <form  action="{{route('user-forgot-submit')}}" method="POST">
                        @csrf
                        <div class="input-box">
                            <span>{{__('Email Address')}} *</span>
                            <input type="email" name="email" value="{{Request::old('email')}}">
                            @error('email')
                            <p class="text-danger mb-2 mt-2">{{ $message }}</p>
                            @enderror
                            @if(Session::has('err'))
                            <p class="text-danger mb-2 mt-2">{{ Session::get('err') }}</p>
                            @endif
                        </div>

                        <div class="input-btn mt-4">
                            <button type="submit" class="main-btn">{{__('Send Mail')}}</button>
                            <p class="d-inline-block float-right"><a href="{{route('user.login')}}">{{__('Login Now')}}</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--   hero area end    -->
@endsection
