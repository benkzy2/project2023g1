@extends('front.layout')

@section('content')
 <!--====== PAGE TITLE PART START ======-->

 <section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($bs->contact_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($bs->contact_title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<!--====== PAGE TITLE PART ENDS ======-->

    <!--====== CONTACT PART START ======-->

    <section class="contact-area pt-60 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-form pt-75">
                        <h4 class="comment-title">{{convertUtf8($contact->contact_form_title)}}</h4>
                        <form  action="{{route('front.sendmail')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <label>{{__('Your Name')}} :</label>
                                        <input name="name" type="text">
                                        @error('name')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                        @enderror
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form">
                                        <label>{{__('Email Address')}} :</label>
                                        <input name="email" type="email">
                                        @error('email')
                                        <p class="text-danger">{{convertUtf8($message)}}</p>
                                        @enderror
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form">
                                        <label>{{__('Subject')}} :</label>
                                        <input name="subject" type="text">
                                        @error('subject')
                                        <p class="text-danger">{{convertUtf8($message)}}</p>
                                        @enderror
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form">
                                        <label>{{__('Write a message')}} :</label>
                                        <textarea name="message"></textarea>
                                        @error('message')
                                        <p class="text-danger">{{convertUtf8($message)}}</p>
                                        @enderror
                                    </div> <!-- single form -->
                                </div>

                                @if ($bs->is_recaptcha == 1)
                                    <div class="col-lg-12 mb-4">

                                        <div data-sitekey="{{$bs->google_recaptcha_site_key}}" class="g-recaptcha"></div>

                                        @if ($errors->has('g-recaptcha-response'))
                                        @php
                                            $errmsg = $errors->first('g-recaptcha-response');
                                        @endphp
                                        <p class="text-danger mb-0">{{__("$errmsg")}}</p>
                                        @endif
                                    </div>
                                @endif
                                <div class="col-md-12">
                                    <div class="single-form">
                                        <button type="submit">{{__('Submit Now')}}</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                        <p class="form-message"></p>
                    </div> <!-- blog form -->
                </div>
                <div class="col-lg-3 col-sm-6 offset-lg-1">
                    <div class="contact-area-info">
                        <div class="title-area">
                            <h4 class="title">{{convertUtf8($contact->contact_info_title)}}</h4>
                            <p>{{convertUtf8($contact->contact_text)}}</p>
                        </div>
                        <div class="contact-info-list">
                            <div class="item mt-30">
                                <i class="flaticon-placeholder"></i>
                                <ul>
                                    @foreach (explode(',',$contact->contact_address) as $address)
                                    <li>{{convertUtf8($address)}}</li>
                                    @endforeach

                                </ul>
                            </div>
                            <div class="item mt-30">
                                <i class="flaticon-mail"></i>
                                <ul>
                                    <li>{{convertUtf8($be->to_mail)}}</li>
                                </ul>
                            </div>
                            <div class="item mt-30">
                                <i class="flaticon-smartphone"></i>
                                <ul>
                                    @foreach (explode(',',$contact->contact_number) as $number)
                                    <li>{{convertUtf8($number)}}</li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- row -->
        </div>
    </section>

    <!--====== CONTACT PART ENDS ======-->


@endsection
