@extends("front.layout")

@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/'.$bs->breadcrumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{convertUtf8($be->career_title)}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Career')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--====== PAGE TITLE PART ENDS ======-->


  <!--    job lists start   -->
  <div class="job-lists">
     <div class="container">
        <div class="row">
           <div class="col-lg-8">
              <div class="row">
                @if (count($jobs) == 0)
                  <div class="col-12 bg-light py-5">
                    <h3 class="text-center">{{__('NO JOB FOUND')}}</h3>
                  </div>
                @else
                  @foreach ($jobs as $key => $job)
                    <div class="col-md-12">
                       <div class="single-job @if($loop->last) mb-0 @endif">

                            <h3><a href="{{route('front.careerdetails', [$job->slug, $job->id])}}" class="title">{{convertUtf8($job->title)}}</a></h3>

                            @php
                            $deadline = \Carbon\Carbon::parse($job->deadline)->locale("$currentLang->code");
                            $deadline = $deadline->translatedFormat('jS F, Y');
                            @endphp

                            <p class="deadline"><strong><i class="far fa-calendar-alt"></i> {{__('Deadline')}}:</strong> {{$deadline}}</p>
                            <p class="education"><strong><i class="fas fa-graduation-cap"></i> {{__('Educational Experience')}}:</strong> {!! (strlen(convertUtf8(strip_tags($job->educational_requirements))) > 110) ? convertUtf8(substr(strip_tags($job->educational_requirements), 0, 110)) . '...' : convertUtf8(strip_tags($job->educational_requirements)) !!}</p>
                            <p class="experience"><strong><i class="fas fa-briefcase"></i> {{__('Work Experience')}}:</strong> {{convertUtf8($job->experience)}}</p>
                       </div>
                    </div>
                  @endforeach
                @endif
              </div>
              <div class="row">
                <div class="col-md-12">
                   <nav class="pagination-nav">
                     {{$jobs->appends(['category' => request()->input('category'), 'term' => request()->input('term')])->links()}}
                   </nav>
                </div>
              </div>
           </div>
           <!--    job sidebar start   -->
           <div class="col-lg-4">
             <div class="blog-sidebar-widgets">
                <div class="searchbar-form-section">
                   <form action="{{route('front.career')}}">
                      <div class="searchbar">
                         <input name="category" type="hidden" value="{{request()->input('category')}}">
                         <input name="term" type="text" placeholder="{{__('Search Jobs')}}" value="{{request()->input('term')}}">
                         <button type="submit"><i class="fa fa-search"></i></button>
                      </div>
                   </form>
                </div>
             </div>
             <div class="blog-sidebar-widgets category-widget">
                <div class="category-lists job">
                   <h4>{{__('Job Categories')}}</h4>
                   <ul>
                        <li class="single-category {{empty(request()->input('category')) ? 'active' : ''}}">
                            <a href="{{route('front.career')}}">{{__('All')}} <span>({{$jobscount}})</span></a>
                        </li>
                        @foreach ($jcats as $key => $jcat)
                            <li class="single-category {{$jcat->id == request()->input('category') ? 'active' : ''}}"><a href="{{route('front.career', ['category' => $jcat->id, 'term'=>request()->input('term')])}}">{{convertUtf8($jcat->name)}} <span>({{$jcat->jobs()->count()}})</span></a></li>
                        @endforeach
                   </ul>
                </div>
             </div>
           </div>
           <!--    job sidebar end   -->
        </div>
     </div>
  </div>
  <!--    job lists end   -->
@endsection
