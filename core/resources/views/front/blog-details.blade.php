@extends('front.layout')
@section('meta-keywords', "$blog->meta_keywords")
@section('meta-description', "$blog->meta_description")
@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{convertUtf8($bs->blog_details_title)}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($blog->title)}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== BLOG DETAILS PART START ======-->

    <section class="blog-details-area pt-70 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog-details-items mt-50">
                        <div class="blog-thumb">
                            <img src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="blog">
                        </div>
                        <div class="blog-details-content">
                            <h2 class="title">{{convertUtf8($blog->title)}}</h2>
                        </div>
                        <p>{!! nl2br(replaceBaseUrl(convertUtf8($blog->content))) !!}</p>

                        <div class="blog-social">
                            <div class="shop-social d-flex align-items-center">
                                <span>{{__('Share')}} :</span>
                                <ul>
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u={{urlencode(url()->current()) }}"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{urlencode(url()->current()) }}"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{urlencode(url()->current()) }}&amp;title={{convertUtf8($blog->title)}}"><i class="fab fa-linkedin"></i></a></li>

                                </ul>
                            </div>
                        </div>

                        <div class="blog-details-comment">
                                <div class="comment-lists">
                                    <div id="disqus_thread"></div>
                                  </div>
                        </div> <!-- blog details comment -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="blog-sidebar">
                        <div class="blog-box blog-border mt-50">
                            <div class="blog-title pl-45">
                                <h4 class="title"><i class="fa fa-list {{$rtl == 1 ? 'mr-20 ml-10' : 'mr-10'}}"></i>{{__('All Categories')}}</h4>
                            </div>
                            <div class="blog-cat-list pl-45 pr-45">
                                <ul>
                                    @foreach ($bcats as $key => $bcat)
                                    <li class="single-category @if(request()->input('category') == $bcat->id) active @endif"><a href="{{route('front.blogs', ['term'=>request()->input('term'), 'category'=>$bcat->id])}}">{{convertUtf8(convertUtf8($bcat->name))}}</a></li>
                                 @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== BLOG DETAILS PART ENDS ======-->


@endsection
