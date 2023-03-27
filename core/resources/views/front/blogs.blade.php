@extends('front.layout')

@section('content')
 <!--====== PAGE TITLE PART START ======-->

 <section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/'.$bs->breadcrumb)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($bs->blog_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('Our Blog')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

<!--====== PAGE TITLE PART ENDS ======-->

<!--====== BLOG PART START ======-->

<section class="blog-area pb-80">
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
            @forelse ($blogs as $blog)
            <div class="col-lg-4 col-md-7 col-sm-8">
                <div class="single-blog mt-30">
                    <div class="blog-thumb">
                        <img class="lazy wow fadeIn" data-src="{{asset('assets/front/img/blogs/'.$blog->main_image)}}" alt="blog-image" data-wow-delay=".5s">
                    </div>
                    <div class="blog-content">
                        <a href="{{route('front.blogdetails', [$blog->slug, $blog->id])}}">
                        <h3 class="title">{{convertUtf8($blog->title)}}</h3>
                        </a>
                        <p>{{ (strlen(strip_tags(convertUtf8($blog->content))) > 100) ? substr(strip_tags(convertUtf8($blog->content)), 0, 100) . '...' : strip_tags(convertUtf8($blog->content)) }}</p>
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
            @empty
                  <h3>{{__('No Blogs')}}</h3>
            @endforelse

            <div class="col-lg-12">
                <div class="pagination-part">

                        {{ $blogs->appends(['category' => request()->input('category')])->links() }}

                </div>
            </div>
        </div>
    </div>
</section>


@endsection
