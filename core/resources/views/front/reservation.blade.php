@extends('front.layout')


@section('content')

<section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($bs->reservation_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($bs->reservation_title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="reservation-2-area reservation-3-area book-reservation">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="white-bg pt-130 pb-120">
                    <div class="reservation-tree">
                        <img src="{{asset('assets/front/img/'.$be->table_section_img)}}" alt="">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="section-title text-center">
                                <span>{{__('Our Reservation')}} <img src="{{asset('assets/front/img/title-icon.png')}}" alt=""></span>
                                <h3 class="title">{{__('Reservation Book A Table')}}</h3>
                            </div>
                            <form action="{{route('front.table.book')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="{{__('Full Name')}}" name="name" value="{{old('name')}}">
                                            @error('name')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="{{__('Phone')}}" name="phone" value="{{old('phone')}}">
                                            @error('phone')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-box mt-20">
                                            <input type="text" id="datepicker" placeholder="{{__('Date')}}" name="date" value="{{old('date')}}" autocomplete="off">
                                            @error('date')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                        <input type="text" placeholder="{{__('Email Address')}}" name="email" value="{{old('email')}}">
                                            @error('email')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-box mt-20">
                                            <input type="text" placeholder="{{__('Time')}}" class="timepicker" name="time" value="{{old('time')}}" autocomplete="off">
                                            @error('time')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                        <div class="input-box mt-20">
                                        <input type="text" placeholder="{{__('Person')}}" name="person" value="{{old('person')}}">
                                            @error('person')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    @if ($bs->is_recaptcha == 1)
                                        <div class="col-lg-12 mt-20 text-center">
                                            <div data-sitekey="{{$bs->google_recaptcha_site_key}}" class="g-recaptcha d-inline-block"></div>

                                            @if ($errors->has('g-recaptcha-response'))
                                            @php
                                                $errmsg = $errors->first('g-recaptcha-response');
                                            @endphp
                                            <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                                            @endif
                                        </div>
                                    @endif

                                    <div class="col-lg-12">
                                        <div class="book-btn text-center mt-50">
                                            <button class="main-btn main-btn-2" type="submit">{{__('Book Table')}}</button>
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
</section>
@endsection

