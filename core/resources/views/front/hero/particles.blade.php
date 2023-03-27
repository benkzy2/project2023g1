<div>

    <div class="banner-area bg_cover d-flex align-items-center lazy" id="particles-js" data-bg="{{$be->hero_bg ? asset('assets/front/img/'.$be->hero_bg) : ''}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-7">
                    <div class="banner-content">
                        <h1 data-animation="fadeInUp" data-delay="1s"  class="title" style="color: #{{$be->hero_section_bold_text_color}}; font-size: {{$be->hero_section_bold_text_font_size}}px;">{{convertUtf8($be->hero_section_bold_text)}}</h1>
                        <p data-animation="fadeInUp" data-delay="1.3s" style="color: #{{$be->hero_section_text_color}}; font-size: {{$be->hero_section_text_font_size}}px;">{{convertUtf8($be->hero_section_text)}}</p>
                        <ul data-animation="fadeInUp" data-delay="1.6s" >
                            @if($be->hero_section_button_text && $be->hero_section_button_url)
                            <li><a style="color:#{{$be->hero_section_button_color}};border: 2px solid #{{$be->hero_section_button_color}};font-size: {{$be->hero_section_button_text_font_size}}px;" class="main-btn" href="{{$be->hero_section_button_url}}">{{convertUtf8($be->hero_section_button_text)}} </a></li>
                            @endif
                            @if($be->hero_section_button2_text && $be->hero_section_button2_url)
                            <li><a class="main-btn main-btn-2" href="{{$be->hero_section_button2_url}}" style="font-size: {{$be->hero_section_button2_text_font_size}}px;">{{convertUtf8($be->hero_section_button2_text)}} </a></li>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if(!empty($be->hero_side_img))
        <div class="banner-thumb d-none d-md-block">
            <img class="lazy" data-src="{{asset('assets/front/img/'.$be->hero_side_img)}}" alt="banner">
        </div>
        @endif
    </div>

</div>
