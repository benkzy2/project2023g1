<!doctype html>
<html lang="en" @if($rtl == 1) dir="rtl" @endif>

<head>
    <!--Start of Google Analytics script-->
    @if ($bs->is_analytics == 1)
    {!! $bs->google_analytics_script !!}
    @endif
    <!--End of Google Analytics script-->

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta-description')">
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== Title ======-->
    <title>{{$bs->website_title}}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('assets/front/img/'.$bs->favicon)}}" type="image/png">


    <link rel="stylesheet" href="{{asset('assets/front/css/plugin.min.css')}}">

    <!--====== Default css ======-->

    <link rel="stylesheet" href="{{asset('assets/front/css/default.css')}}">


    @if (count($langs) == 0)
    <style media="screen">
    .support-bar-area ul.social-links li:last-child {
        margin-right: 0px;
    }
    .support-bar-area ul.social-links::after {
        display: none;
    }
    </style>
    @endif
    @if($bs->feature_section == 0)
    <style media="screen">
    .hero-txt {
        padding-bottom: 160px;
    }
    </style>
    @endif
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/styles.php?color='.str_replace('#','',$bs->base_color)) }}">
    @if ($rtl == 1)
    <link rel="stylesheet" href="{{asset('assets/front/css/rtl.css')}}">
    @endif
    @if ($bs->is_tawkto == 1 || $bs->is_whatsapp == 1)
    <style>
        .go-top-area .go-top.active {
            right: auto;
            left: 20px;
        }
    </style>
    @endif
    @yield('style')

    <!--====== jquery js ======-->
    <script src="{{asset('assets/front/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/front/js/vendor/jquery.3.2.1.min.js')}}"></script>

    @if ($bs->is_appzi == 1)
    <!-- Start of Appzi Feedback Script -->
    <script async src="https://app.appzi.io/bootstrap/bundle.js?token={{$bs->appzi_token}}"></script>
    {!! $bs->appzi_script !!}
    <!-- End of Appzi Feedback Script -->
    @endif

    <!-- Start of Facebook Pixel Code -->
    @if ($be->is_facebook_pexel == 1)
      {!! $be->facebook_pexel_script !!}
    @endif
    <!-- End of Facebook Pixel Code -->

    @if ($bs->is_recaptcha == 1)
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('g-recaptcha', {
          'sitekey' : '{{$bs->google_recaptcha_site_key}}'
        });
      };
    </script>
    @endif
</head>

<body>

    <!--====== PRELOADER PART START ======-->
    @if ($bs->preloader_status == 1)
    <div id="preloader">
        <div class="loader revolve">
            <img src="{{asset('assets/front/img/' . $bs->preloader)}}" alt="">
        </div>
    </div>
    @endif
    <!--====== PRELOADER PART ENDS ======-->

    {{-- Loader --}}
    <div class="request-loader">
        <img src="{{asset('assets/admin/img/loader.gif')}}" alt="">
    </div>
    {{-- Loader --}}


    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navigation">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="support-bar">
                            <div class="row">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <div class="infos">
                                        <span><i class="fas fa-envelope-open-text"></i> {{convertUtf8($bs->support_email)}}</span>
                                        <span><i class="fas fa-phone-alt"></i> {{convertUtf8($bs->support_phone)}}</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-6 col-12">
                                    <div class="links">
                                        @if (!empty($socials))
                                        <ul class="social-links">
                                            @foreach ($socials as $social)
                                            <li><a href="{{$social->url}}" target="_blank"><i class="{{$social->icon}}"></i></a></li>
                                            @endforeach
                                        </ul>
                                        @endif

                                        @if (!empty($currentLang))
                                            <div class="language">
                                                <a class="language-btn" href="#"><i class="fas fa-globe-asia"></i> {{convertUtf8($currentLang->name)}}</a>
                                                <ul class="language-dropdown">
                                                    @foreach ($langs as $key => $lang)
                                                    <li><a href='{{ route('changeLanguage', $lang->code) }}'>{{convertUtf8($lang->name)}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @guest
                                        <ul class="login">
                                            <li><a href="{{route('user.login')}}">{{__('Login')}}</a></li>
                                        </ul>
                                        @endguest
                                        @auth
                                        <ul class="login">
                                            <li><a href="{{route('user-dashboard')}}">{{__('Dashboard')}}</a></li>
                                        </ul>
                                        @endauth
                                        <div id="cartQuantity" class="cart">
                                            <a href="{{route('front.cart')}}">
                                                <i class="fas fa-cart-plus"></i>
                                                @php
                                                    $itemsCount = 0;
                                                    $cart = session()->get('cart');
                                                    if(!empty($cart)){
                                                        foreach($cart as $p){
                                                            $itemsCount += $p['qty'];
                                                        }
                                                    }
                                                @endphp
                                                <span class="cart-quantity">{{$itemsCount}}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{route('front.index')}}">
                                <img src="{{asset('assets/front/img/'.$bs->logo)}}" alt="Logo">
                            </a> <!-- logo -->

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarFive" aria-controls="navbarFive" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button> <!-- navbar toggler -->
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarFive">
                                <ul class="navbar-nav m-xl-auto mr-auto">
                                    @php
                                        $links = json_decode($menus, true);
                                        //  dd($links);
                                    @endphp

                                    @foreach ($links as $link)
                                        @php
                                            $href = getHref($link);
                                        @endphp

                                        @if (!array_key_exists("children",$link))
                                            {{--- Level1 links which doesn't have dropdown menus ---}}
                                            <li class="nav-item"><a class="page-scroll" href="{{$href}}" target="{{$link["target"]}}">{{$link["text"]}}</a>
                                            </li>
                                        @else
                                            {{--- Level1 links which has dropdown menus ---}}
                                            <li class="nav-item"><a class="page-scroll" href="{{$href}}" target="{{$link["target"]}}">{{$link["text"]}} <i class="fa fa-angle-down"></i></a>


                                            {{-- START: 2nd level links --}}
                                            <ul class="sub-menu">
                                                @foreach ($link["children"] as $level2)
                                                    @php
                                                        $l2Href = getHref($level2);
                                                    @endphp
                                                    <li class="nav-item @if(array_key_exists("children", $level2)) submenus @endif">
                                                        <a class="page-scroll" href="{{$l2Href}}" target="{{$level2["target"]}}">{{$level2["text"]}}</a>

                                                        {{-- START: 3rd Level links --}}
                                                        @php
                                                            if (array_key_exists("children", $level2)) {
                                                                create_menu($level2);
                                                            }
                                                        @endphp
                                                        {{-- END: 3rd Level links --}}

                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    @endforeach


                                    @if($bs->is_quote)
                                        <li class="nav-item d-block d-sm-none"><a class="page-scroll" href="{{route('front.reservation')}}">{{__('Reservation')}}</a>
                                        </li>
                                    @endif
                                    @if($bs->website_call_waiter == 1)
                                    <li class="nav-item d-block d-sm-none"><a class="page-scroll" data-toggle="modal" data-target="#callWaiterModal">{{__('Call Waiter')}}</a>
                                    </li>
                                    @endif

                                </ul>
                            </div>

                            <div class="navbar-btns d-flex align-items-center">
                                <div class="header-times">
                                    <i class="flaticon-time"></i>
                                    <span>{{__('Opening Time')}}</span>
                                    <p>{{$bs->office_time}}</p>
                                </div>
                                @if($bs->is_quote)
                                    <a class="main-btn main-btn-2 d-none d-sm-inline-block" href="{{route('front.reservation')}}">{{__('Reservation')}}</a>
                                @endif
                                @if($bs->website_call_waiter == 1)
                                    <a class="main-btn main-btn d-none d-sm-inline-block text-white ml-2" data-toggle="modal" data-target="#callWaiterModal">{{__('Call Waiter')}}</a>
                                @endif
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    </header>

    <!--====== HEADER PART ENDS ======-->

    @yield('content')
    {{-- Popups start --}}
    @includeIf('front.partials.popups')
    {{-- Popups end --}}


    <!--====== FOOTER PART START ======-->
    @if($bs->top_footer_section == 1)
        <footer class="footer-area footer-area-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget-1">
                            <div class="header-times d-none d-md-inline-block">
                                <i class="flaticon-time"></i>
                                <h5>{{__('Opening Time')}}</h5>
                                <span>{{convertUtf8($bs->office_time)}}</span>
                            </div>
                            <p>{{convertUtf8($bs->footer_text)}}</p>
                            <ul>
                                @foreach ($socials as $social_link)
                                <li><a href="{{$social_link->url}}"><i class="{{$social_link->icon}}"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 order-3 order-lg-2">
                        <div class="footer-widget-2 text-left text-sm-center >
                            <a href="{{route('front.index')}}"><img src="{{asset('assets/front/img/' . $bs->footer_logo)}}" alt="logo"></a>
                            <ul class="pt-25">
                                @php
                                    $blinks = App\Models\Bottomlink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                                @endphp
                                @foreach ($blinks as $blink)
                                <li><a href="{{$blink->url}}">{{convertUtf8($blink->name)}}</a></li>
                                @endforeach
                            </ul>
                            @if(!empty($be->footer_bottom_img))
                            <a class="pt-30" href="javascript:;">
                                <img class="lazy" data-src="{{asset('assets/front/img/'.$be->footer_bottom_img)}}" alt="">
                            </a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                        <h3 class="subscribe-title">{{__('Subscribe Here')}}</h3>
                        <form id="footerSubscribe" action="{{route('front.subscribe')}}" method="post" class="subscribe-form subscribeForm">
                            @csrf
                            <div class="subscribe-inputs">
                                <input name="email" type="text" placeholder="{{__('Enter Your Email')}}">
                                <button type="submit"><i class="far fa-paper-plane"></i></button>
                            </div>
                            <p id="erremail" class="text-danger mb-0 err-email"></p>
                        </form>
                        <div class="footer-widget-3">
                            <ul>
                                @php
                                    $ulinks = App\Models\Ulink::where('language_id',$currentLang->id)->orderby('id','desc')->get();
                                @endphp

                                @foreach ($ulinks as $ulink)
                                <li><a href="{{$ulink->url}}">+ {{convertUtf8($ulink->name)}}</a></li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </footer>
    @endif
    @if($bs->copyright_section ==1)
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copyright d-block justify-content-center d-md-flex">
                        {!! nl2br(replaceBaseUrl(convertUtf8($bs->copyright_text))) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!--====== FOOTER PART ENDS ======-->

    <!--====== GO TO TOP PART START ======-->

    <div class="go-top-area">
        <div class="go-top-wrap">
            <div class="go-top-btn-wrap">
                <div class="go-top go-top-btn">
                    <i class="fa fa-angle-double-up"></i>
                    <i class="fa fa-angle-double-up"></i>
                </div>
            </div>
        </div>
    </div>

    <!--====== GO TO TOP PART ENDS ======-->

    {{-- WhatsApp Chat Button --}}
    <div id="WAButton"></div>

    {{-- Cookie alert dialog start --}}
    <div class="cookie">
        @include('cookieConsent::index')
    </div>
    {{-- Cookie alert dialog end --}}

    {{-- START: Call Waiter Modal --}}
    <div class="modal fade" id="callWaiterModal" tabindex="-1" role="dialog" aria-labelledby="callWaiterModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{__('Call Waiter')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @php
                        $tables = \App\Table::where('status', 1)->get();
                    @endphp
                    <form id="callWaiterForm" action="{{route('front.callwaiter')}}" method="GET">
                        <select class="form-control" name="table" required>
                            <option value="" disabled selected>{{__('Select a Table')}}</option>
                            @foreach ($tables as $table)
                                <option value="{{$table->table_no}}">{{__('Table')}} - {{$table->table_no}}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" form="callWaiterForm" class="btn base-btn text-white">{{__('Call Waiter')}}</button>
                </div>
            </div>
        </div>
    </div>
    {{-- END: Call Waiter Modal --}}


    <script>
        "use strict";
        var mainurl = "{{url('/')}}";
        var lat = '{{$bs->latitude}}';
        var lng = '{{$bs->longitude}}';
        var rtl = {{ $rtl }};
        var position = "{{$be->base_currency_symbol_position}}";
        var symbol = "{{$be->base_currency_symbol}}";
        var textPosition = "{{$be->base_currency_text_position}}";
        var currText = "{{$be->base_currency_text}}";
        var vap_pub_key = "{{env('VAPID_PUBLIC_KEY')}}";
    </script>

    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
    <!--====== Plugin min js ======-->
    <script src="{{asset('assets/front/js/plugin.min.js')}}"></script>
    <!--====== Push Notification js ======-->
    <script src="{{asset('assets/front/js/enable-push.js')}}" defer></script>
    <!--====== Misc js ======-->
    <script src="{{asset('assets/front/js/misc.js')}}"></script>
    <!--====== Main js ======-->
    <script src="{{asset('assets/front/js/main.js')}}"></script>
    <!--====== Cart js ======-->
    <script src="{{asset('assets/front/js/cart.js')}}"></script>

      {{-- whatsapp init code --}}
      @if ($bs->is_whatsapp == 1)
        <script type="text/javascript">
            var whatsapp_popup = {{$bs->whatsapp_popup}};
            var whatsappImg = "{{asset('assets/front/img/whatsapp.svg')}}";
            $(function () {
                $('#WAButton').floatingWhatsApp({
                    phone: "{{$bs->whatsapp_number}}", //WhatsApp Business phone number
                    headerTitle: "{{$bs->whatsapp_header_title}}", //Popup Title
                    popupMessage: `{!! nl2br($bs->whatsapp_popup_message) !!}`, //Popup Message
                    showPopup: whatsapp_popup == 1 ? true : false, //Enables popup display
                    buttonImage: '<img src="' + whatsappImg + '" />', //Button Image
                    position: "right" //Position: left | right

                });
            });
        </script>
      @endif

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>

    @yield('script')

    @if (session()->has('success'))
    <script>
       "use strict";
       toastr["success"]("{{__(session('success'))}}");
    </script>
    @endif

    @if (session()->has('warning'))
    <script>
       "use strict";
       toastr["warning"]("{{__(session('warning'))}}");
    </script>
    @endif

    @if (session()->has('error'))
    <script>
       "use strict";
       toastr["error"]("{{__(session('error'))}}");
    </script>
    @endif

    <!--Start of Tawk.to script-->
    @if ($bs->is_tawkto == 1)
    {!! $bs->tawk_to_script !!}
    @endif
    <!--End of Tawk.to script-->

    <!--Start of AddThis script-->
    @if ($bs->is_addthis == 1)
    {!! $bs->addthis_script !!}
    @endif
    <!--End of AddThis script-->
</body>

</html>
