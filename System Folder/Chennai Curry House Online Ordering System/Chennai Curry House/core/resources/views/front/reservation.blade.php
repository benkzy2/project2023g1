@extends('front.layout')


@section('content')

<section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/'.$bs->breadcrumb)}}">
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
                        <img class="lazy" data-src="{{asset('assets/front/img/'.$be->table_section_img)}}" alt="">
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div class="section-title text-center">
                                <span>{{convertUtf8($be->table_section_title)}} <img class="lazy" data-src="{{asset('assets/front/img/title-icon.png')}}" alt=""></span>
                                <h3 class="title">{{convertUtf8($be->table_section_subtitle)}}</h3>
                            </div>
                            <form action="{{route('front.table.book')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <label>{{__('Full Name')}} <span>**</span></label>
                                            <input type="text" placeholder="{{__('Full Name')}}" name="name" value="{{old('name')}}">
                                            @error('name')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box mt-20">
                                            <label>{{__('Email Address')}} <span>**</span></label>
                                            <input type="text" placeholder="{{__('Email Address')}}" name="email" value="{{old('email')}}">
                                            @error('email')
                                            <p class="text-danger">{{convertUtf8($message)}}</p>
                                            @enderror
                                        </div>
                                    </div>


                                    @foreach ($inputs as $input)
                                        <div class="{{$input->type == 4 || $input->type == 3 ? 'col-lg-12' : 'col-lg-6'}}">
                                            <div class="input-box mt-20">
                                                @if ($input->type == 1)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    <input name="{{$input->name}}" type="text" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}">
                                                @endif

                                                @if ($input->type == 2)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    <select name="{{$input->name}}">
                                                        <option value="" selected disabled>{{convertUtf8($input->placeholder)}}</option>
                                                        @foreach ($input->quote_input_options as $option)
                                                            <option value="{{convertUtf8($option->name)}}" {{old("$input->name") == convertUtf8($option->name) ? 'selected' : ''}}>{{convertUtf8($option->name)}}</option>
                                                        @endforeach
                                                    </select>
                                                @endif

                                                @if ($input->type == 3)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    @foreach ($input->quote_input_options as $option)
                                                        <div class="custom-control custom-checkbox custom-control-inline">
                                                            <input type="checkbox" id="customCheckboxInline{{$option->id}}" name="{{$input->name}}[]" class="custom-control-input" value="{{convertUtf8($option->name)}}" {{is_array(old("$input->name")) && in_array(convertUtf8($option->name), old("$input->name")) ? 'checked' : ''}}>
                                                            <label class="custom-control-label" for="customCheckboxInline{{$option->id}}">{{convertUtf8($option->name)}}</label>
                                                        </div>
                                                    @endforeach
                                                @endif

                                                @if ($input->type == 4)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    <textarea name="{{$input->name}}" id="" cols="30" rows="10" placeholder="{{convertUtf8($input->placeholder)}}">{{old("$input->name")}}</textarea>
                                                @endif

                                                @if ($input->type == 5)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    <input class="datepicker" name="{{$input->name}}" type="text" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}" autocomplete="off">
                                                @endif

                                                @if ($input->type == 6)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    <input class="timepicker" name="{{$input->name}}" type="text" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}" autocomplete="off">
                                                @endif

                                                @if ($input->type == 7)
                                                    <label>{{convertUtf8($input->label)}} @if($input->required == 1) <span>**</span> @endif</label>
                                                    <input name="{{$input->name}}" type="number" value="{{old("$input->name")}}" placeholder="{{convertUtf8($input->placeholder)}}" autocomplete="off">
                                                @endif

                                                @if ($errors->has("$input->name"))
                                                <p class="text-danger mb-0">{{$errors->first("$input->name")}}</p>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach


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

