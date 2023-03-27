@extends('front.layout')

@section('content')
    <!--====== HERO SECTION PART START ======-->
    @if ($bs->home_version == 'static')
        @includeIf('front.hero.static')
    @elseif ($bs->home_version == 'slider')
        @includeIf('front.hero.slider')
    @elseif ($bs->home_version == 'video')
        @includeIf('front.hero.video')
    @elseif ($bs->home_version == 'water')
        @includeIf('front.hero.water')
    @elseif ($bs->home_version == 'particles')
        @includeIf('front.hero.particles')
    @elseif ($bs->home_version == 'parallax')
        @includeIf('front.hero.parallax')
    @endif
    <!--====== HERO SECTION PART END ======-->


    <!--====== FREES PART START ======-->

    <div class="fress-area" style="@if($bs->feature_section == 0) padding-bottom: 0px; @endif">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        @if ($bs->home_version == 'slider')
                            @if (!empty($be->slider_bottom_img))
                            <div class="fress-thumb text-center mb-90">
                                <img src="{{asset('assets/front/img/'.$be->slider_bottom_img)}}" alt="fress">
                            </div>
                            @endif
                        @else
                            @if (!empty($be->hero_bottom_img))
                            <div class="fress-thumb text-center mb-90">
                                <img src="{{asset('assets/front/img/'.$be->hero_bottom_img)}}" alt="fress">
                            </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
            @if($bs->feature_section == 1)
            <div class="row fress-active {{ !empty($bottomImg) ? '' : 'pt-120'}}">
                @foreach ($features as $feature)
                <div class="col-lg-3">
                    <div class="single-fress white-bg text-center">
                        @if (!empty($feature->image))
                        <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/features/'.$feature->image)}}" data-wow-delay="1s" data-wow-duration="1s" alt="feature">
                        @endif
                        <a href="javascript:;">{{convertUtf8($feature->title)}}</a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="fress-shape">
            @if ($bs->home_version == 'slider')
                @if (!empty($be->slider_shape_img))
                <img class="lazy" data-src="{{asset('assets/front/img/'.$be->slider_shape_img)}}" alt="shape">
                @endif
            @else
                @if (!empty($be->hero_shape_img))
                    <img class="lazy" data-src="{{asset('assets/front/img/'.$be->hero_shape_img)}}" alt="shape">
                @endif
            @endif
        </div>
    </div>

    <!--====== FREES PART ENDS ======-->

    <!--====== EXPERIENCE PART START ======-->
    @if($bs->intro_section == 1)
        <section class="experience-area">
            <div class="container">
                <div class="row justify-content-center justify-content-lg-end">
                    <div class="col-lg-6 col-md-8">
                        <div class="experience-content">
                            @if($bs->intro_section_title)
                            <div class="flag"><span>{{convertUtf8($bs->intro_section_title)}}</span></div>
                            @endif
                            <h3 class="title wow fadeIn" data-wow-duration="2000ms" data-wow-delay="0ms">{{convertUtf8($bs->intro_title)}}</h3>
                            <p class=" wow fadeIns" data-wow-duration="2000ms" data-wow-delay="300ms">{{convertUtf8($bs->intro_text)}}</p>

                            @if(!empty($bs->intro_signature))
                            <img class="lazy wow fadeIn" data-wow-duration="2000ms" data-wow-delay="600ms" data-src="{{asset('assets/front/img/'.$bs->intro_signature)}}" alt="autograph">
                            @endif
                            <i class="flaticon-burger"></i>
                        </div>

                    </div>
                </div>
                <div class="row align-items-end">
                    @if($bs->intro_contact_text && $bs->intro_contact_number)
                    <div class="col-lg-4 col-md-7">
                        <div class="experience-contact mb-50 wow fadeIn animated" data-wow-duration="2000ms" data-wow-delay="300ms">
                            <span>{{convertUtf8($bs->intro_contact_text)}}</span>
                            <p>{{convertUtf8($bs->intro_contact_number)}}</p>
                            <i class="flaticon-phone-call"></i>
                        </div>
                    </div>
                    @endif
                    @if($bs->intro_video_image && $bs->intro_video_link)
                    <div class="col-lg-1"></div>
                    <div class="col-lg-7">
                        <div class="experience-play-item mt-70">
                            @php
                                $videobg = str_replace ( 'core' , '' , base_path() ) . 'assets/front/img/'.$bs->intro_video_image;
                            @endphp
                            @if (file_exists($videobg))
                            <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/'.$bs->intro_video_image)}}" alt="experience">
                            @endif
                            <div class="experience-overlay">
                                <a class="video-popup" href="{{$bs->intro_video_link}}"><i class="flaticon-arrow"></i></a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            @if($bs->intro_main_image)
            <div class="experience-bg">
                <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/'.$bs->intro_main_image)}}" alt="experience">
            </div>
            @endif

        </section>
    @endif
    <!--====== EXPERIENCE PART ENDS ======-->

    <!--====== FOOD MENU PART START ======-->
    @if($bs->menu_section == 1)
        @if ($be->menu_version == 1)
            <section class="food-menu-area food-menu-2-area food-menu-3-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center">
                                <span>{{convertUtf8($be->menu_section_title)}}
                                    <img class="lazy" data-src="{{asset('assets/front/img/title-icon.png')}}" alt=""></span>
                                <h3 class="title">{{convertUtf8($be->menu_section_subtitle)}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-btn pb-20">
                                <ul class="nav nav-pills d-flex justify-content-center" id="pills-tab" role="tablist">
                                    @foreach ($categories as $keys => $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{$keys == 0 ? 'active' : ''}}" id="{{$category->slug}}-tab" data-toggle="pill" href="#{{$category->slug}}" role="tab" aria-controls="{{$category->slug}}" aria-selected="true">
                                            @if (!empty($category->image))
                                                <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/category/'.$category->image)}}" data-wow-delay=".5s" alt="menu">
                                            @endif
                                            <p @if(empty($category->image)) style="padding-top: 0px;" @endif>{{convertUtf8($category->name)}} ({{$category->products()->where('is_feature', 1)->count()}})</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($categories as $key => $category)
                                <div class="tab-pane fade {{$key == 0 ? 'show active' : ''}}"  id="{{$category->slug}}" role="tabpanel" aria-labelledby="{{$category->slug}}-tab">
                                    <div class="row justify-content-center">
                                        @if($category->products()->where('is_feature', 1)->where('status', 1)->count() > 0)
                                        @foreach ($category->products()->where('is_feature', 1)->where('status', 1)->get() as $product)
                                        <div class="col-lg-6">
                                            <div class="food-menu-items">
                                                <div class="single-menu-item mt-30">
                                                    <div class="menu-thumb">
                                                        <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" alt="menu" data-wow-delay=".5s">
                                                        <div class="thumb-overlay">
                                                            <a href="{{route('front.product.details',[$product->slug,$product->id])}}"><i class="flaticon-add"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="menu-content ml-30">
                                                        <a class="title" href="{{route('front.product.details',[$product->slug,$product->id])}}">{{convertUtf8($product->title)}}</a>
                                                        <p>{{convertUtf8(strlen($product->summary)) > 70 ? convertUtf8(substr($product->summary, 0, 70)) . '...' : convertUtf8($product->summary)}} </p>
                                                    </div>
                                                    <div class="menu-price-btn">
                                                        <a class="cart-link" data-product="{{$product}}" data-href="{{route('add.cart',$product->id)}}">{{__('Add to Cart')}}</a>

                                                        <span>{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->current_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                                        </span>
                                                        @if($product->previous_price)
                                                        <del>  {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->previous_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</del>
                                                        @endif
                                                    </div>
                                                    @if ($product->is_special == 1)
                                                        <div class="flag flag-2"><span>{{__('Special')}}</span></div>
                                                    @endif

                                                </div>

                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                        <div class="col-lg-12 bg-light py-5 mt-4">
                                            <h4 class="text-center">{{__('Product Not Found')}}</h4>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach



                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-more-btn text-center mt-75">
                                <a href="{{route('front.product')}}">{{__('View All Items')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @else
            @if (!empty($be->menu_section_img))
                <style>
                    .food-menu-area .food-menu-items.menu-2::before {
                        background-image: url("{{asset('assets/front/img/' . $be->menu_section_img)}}");
                    }
                </style>
            @endif
            <section class="food-menu-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center">
                                <span>{{convertUtf8($be->menu_section_title)}} <img src="{{asset('assets/front/img/title-icon.png')}}" alt=""></span>
                                <h3 class="title">{{convertUtf8($be->menu_section_subtitle)}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs-btn pb-20">
                                <ul class="nav nav-pills d-flex justify-content-center" id="pills-tab" role="tablist">
                                    @foreach ($categories as $keys => $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{$keys == 0 ? 'active' : ''}}" id="{{convertUtf8($category->slug)}}-tab" data-toggle="pill" href="#{{convertUtf8($category->slug)}}" role="tab" aria-controls="{{convertUtf8($category->slug)}}" aria-selected="true">
                                            @if (!empty($category->image))
                                                <img class="lazy wow fadeIn" src="{{asset('assets/front/img/category/'.$category->image)}}" data-wow-delay=".5s" alt="menu">
                                            @endif
                                            <p @if(empty($category->image)) style="padding-top: 0px;" @endif>{{convertUtf8($category->name)}} ({{$category->products()->where('is_feature', 1)->count()}})</p>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($categories as $key => $category)
                                <div class="tab-pane fade {{$key == 0 ? 'show active' : ''}}" id="{{convertUtf8($category->slug)}}"  role="tabpanel" aria-labelledby="{{convertUtf8($category->slug)}}-tab">
                                    <div class="food-menu-items menu-2">
                                        @if($category->products()->where('is_feature', 1)->where('status', 1)->count() > 0)
                                        @foreach ($category->products()->where('is_feature', 1)->where('status', 1)->get() as $product)
                                        <div class="single-menu-item mt-30">
                                            <div class="menu-thumb">
                                                <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" data-wow-delay=".5s" alt="menu">
                                                <div class="thumb-overlay">
                                                    <a href="{{route('front.product.details',[$product->slug,$product->id])}}"><i class="flaticon-add"></i></a>
                                                </div>
                                            </div>
                                            <div class="menu-content ml-30">
                                                <a class="title" href="{{route('front.product.details',[$product->slug,$product->id])}}">{{convertUtf8($product->title)}}</a>
                                                <p>{{convertUtf8(strlen($product->summary)) > 180 ? convertUtf8(substr($product->summary, 0, 180)) . '...' : convertUtf8($product->summary)}} </p>
                                            </div>
                                            <div class="menu-price-btn menu-2">
                                                <span>{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->current_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                                </span>
                                                @if($product->previous_price)
                                                    <del>  {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->previous_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</del>
                                                @endif
                                                <a class="cart-link" data-product="{{$product}}" data-href="{{route('add.cart',$product->id)}}">{{__('Add to Cart')}}</a>
                                            </div>
                                            @if ($product->is_special == 1)
                                            <div class="flag flag-2"><span>{{__('Special')}}</span></div>
                                            @endif
                                        </div>
                                        @endforeach
                                        @else
                                            <div class="col-lg-12 bg-light py-5 mt-4">
                                                <h4 class="text-center">{{__('Product Not Found')}}</h4>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="menu-more-btn text-center mt-75">
                                <a href="{{route('front.product')}}">{{__('View All Items')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
    <!--====== FOOD MENU PART ENDS ======-->


    <!--====== GOOD FOOD PART START ======-->
    @if($bs->special_section == 1)
        <section class="good-food-area pt-180 pb-120 gray-bg">
            <style>
                .good-food-area::before {
                    background-image: url('{{asset("assets/front/img/" . $be->special_section_bg)}}');
                }
            </style>
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-8">
                        <div class="special-items">
                            @foreach ($special_product as $sproduct)
                                <div class="good-food-item white-bg text-center">
                                    <div class="food-shape">
                                        <img class="food-shape-img" src="{{asset('assets/front/img/good-food-shape.png')}}" alt="shape">
                                    </div>
                                    <h3 class="title">{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($sproduct->current_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</h3>
                                    @if (!empty(convertUtf8($sproduct->previous_price)))
                                        <del class="preprice">{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($sproduct->previous_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</del>
                                    @endif
                                    <a class="title" href="{{route('front.product.details',[$sproduct->slug,$sproduct->id])}}">{{convertUtf8($sproduct->title)}}</a>
                                    <p>{{convertUtf8(strlen($sproduct->summary)) > 70 ? convertUtf8(substr($sproduct->summary,0, 70)) . '...' : convertUtf8($sproduct->summary)}}</p>
                                    <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/product/featured/'.$sproduct->feature_image)}}" alt="">
                                    <div class="special-btns">
                                        <a class="cart-link" data-product="{{$sproduct}}" data-href="{{route('add.cart',$sproduct->id)}}">{{__('Add to Cart')}}</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="menu-list-content text-right d-none d-lg-block">
                            @php
                                $parts = preg_split('/\s+/', convertUtf8($be->special_section_title));
                            @endphp
                            <ul>
                                @foreach ($parts as $part)
                                <li>{{convertUtf8($part)}}</li>
                                @endforeach
                            </ul>
                            <a><span>{{convertUtf8($be->special_section_subtitle)}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--====== GOOD FOOD PART ENDS ======-->

    <!--====== TEAM PART START ======-->
    @if($bs->team_section == 1)
        <section class="team-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="section-title text-center">
                            <span>{{convertUtf8($bs->team_section_title)}} <img src="{{asset('assets/front/img/title-icon.png')}}" alt=""></span>
                            <h3 class="title">{{convertUtf8($bs->team_section_subtitle)}}</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($members as $member)
                    <div class="col-lg-4 col-md-7 col-sm-9">
                        <div class="single-team mt-30">
                            <div class="team-thumb">
                                @if($member->image)
                                <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/members/'.$member->image)}}" data-wow-delay=".5s" data-wow-duration="1s" alt="team">
                                @endif
                                <div class="team-overlay">
                                    <div class="link">
                                        <a><i class="flaticon-add"></i></a>
                                    </div>
                                    <div class="social">
                                        <ul>
                                            @if($member->facebook)
                                            <li><a href="{{$member->facebook}}"><i class="flaticon-facebook"></i></a></li>
                                            @endif
                                            @if($member->twitter)
                                            <li><a href="{{$member->twitter}}"><i class="flaticon-twitter"></i></a></li>
                                            @endif
                                            @if($member->instagram)
                                            <li><a href="{{$member->instagram}}"><i class="flaticon-instagram"></i></a></li>
                                            @endif
                                            @if($member->linkedin)
                                            <li><a href="{{$member->linkedin}}"><i class="flaticon-linkedin"></i></a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4 class="title">{{convertUtf8($member->name)}}</h4>
                                <span>{{convertUtf8($member->rank)}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif
    <!--====== TEAM PART ENDS ======-->

    <!--====== CLIENT PART START ======-->
    @if($bs->testimonial_section == 1)
        <section class="client-area bg_cover pt-105 pb-95 lazy" data-bg="{{$be->testimonial_bg_img ? asset('assets/front/img/'.$be->testimonial_bg_img) : ''}}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="client-title text-center">
                            <h3 class="title">{{convertUtf8($bs->testimonial_title)}}</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="client-items client-active">
                            @foreach ($testimonials as $testimonial)
                            <div class="single-client">
                                <div class="text">
                                    <p>{{convertUtf8($testimonial->comment)}}</p>
                                </div>
                                <div class="client-info d-block d-sm-flex justify-content-between">
                                    <div class="item-1">
                                        @if($testimonial->image)
                                        <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/testimonials/'.$testimonial->image)}}" alt="clients">
                                        @endif
                                        <span>{{convertUtf8($testimonial->name)}}</span>
                                        <p>{{convertUtf8($testimonial->rank)}}</p>
                                    </div>
                                    <div class="item-2 text-sm-right text-left">
                                        <ul>
                                            @php
                                            $i = 0;
                                                for($i==1;$i < $testimonial->rating; $i++){
                                                    echo '<li><i class="flaticon-star"></i></li>';
                                                }
                                            @endphp
                                        </ul>
                                        <span>({{($testimonial->rating)}} {{__('Stars')}})</span>

                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    <!--====== CLIENT PART ENDS ======-->

    <!--====== BLOG PART START ======-->
    @if($bs->news_section == 1)
        <section class="blog-area pb-130">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="section-title text-center">
                            <span>{{convertUtf8($bs->blog_section_title)}} <img src="{{asset('assets/front/img/title-icon.png')}}" alt=""></span>
                            <h3 class="title">{{convertUtf8($bs->blog_section_subtitle)}}</h3>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @foreach ($blogs as $blog)
                    <div class="col-lg-6 col-md-8">
                        <div class="single-blog mt-30">
                            <div class="blog-thumb">
                                <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="" data-wow-delay=".5s" data-wow-duration="1s">
                            </div>
                            <div class="blog-content">
                                <a href="{{route('front.blogdetails',[$blog->slug, $blog->id])}}">
                                    <h3 class="title">{{convertUtf8($blog->title)}}</h3>
                                </a>
                                <p>{{ convertUtf8(strlen(strip_tags($blog->content)) > 100) ? convertUtf8(substr(strip_tags($blog->content), 0, 100)) . '...' : convertUtf8(strip_tags($blog->content)) }}</p>

                                <div class="blog-comments d-block d-sm-flex justify-content-between align-items-center">
                                    <a href="{{route('front.blogdetails',[$blog->slug, $blog->id])}}">{{__('Read More')}}</a>
                                    <ul>
                                        <li><i class="far fa-calendar-alt"></i>
                                            {{ \Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}
                                            <span>|</span> {{__('Admin')}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>

        </section>
    @endif
    <!--====== BLOG PART ENDS ======-->


    <!--====== RESERVATION PART START ======-->
    @if($bs->is_quote == 1)
    @if($bs->table_section == 1)
        <section class="reservation-area bg_cover">
            <div id="map">
                <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{$bs->latitude}},%20{{$bs->longitude}}+(My%20Business%20Name)&amp;t=&amp;z={{$bs->map_zoom}}&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
            </div>
        </section>
    @endif
    @endif
    <!--====== RESERVATION PART ENDS ======-->

    {{-- Variation Modal Starts --}}
    @includeIf('front.partials.variation-modal')
    {{-- Variation Modal Ends --}}
@endsection
