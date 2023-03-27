@extends("front.layout")


@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/'.$bs->breadcrumb)}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{convertUtf8($be->career_details_title)}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('Job Details')}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--====== PAGE TITLE PART ENDS ======-->


  <!--    job details section start   -->
  <div class="service-details-section pt-115 pb-115">
     <div class="container">
        <div class="row">
           <div class="col-lg-7">
              <div class="job-details">
                <h3>{{convertUtf8($job->title)}}</h3>
                @if (!empty($job->vacancy))
                <div class="info">
                    <strong class="label">{{__('Vacancy')}}</strong>
                    <div class="desc">{{convertUtf8($job->vacancy)}}</div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->job_responsibilities)))
                <div class="info">
                    <strong class="label">{{__('Job Responsibilities')}}</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->job_responsibilities)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->employment_status)))
                <div class="info">
                    <strong class="label">{{__('Employment Status')}}</strong>
                    <div class="desc">{{ convertUtf8($job->employment_status) }}</div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->educational_requirements)))
                <div class="info">
                    <strong class="label">Educational Requirements</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->educational_requirements)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->experience_requirements)))
                <div class="info">
                    <strong class="label">{{__('Experience Requirements')}}</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->experience_requirements)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->additional_requirements)))
                <div class="info">
                    <strong class="label">{{__('Additional Requirements')}}</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->additional_requirements)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->job_location)))
                <div class="info">
                    <strong class="label">{{__('Job Location')}}</strong>
                    <div class="desc">
                        {{ convertUtf8($job->job_location) }}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->salary)))
                <div class="info">
                    <strong class="label">{{__('Salary')}}</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->salary)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->benefits)))
                <div class="info">
                    <strong class="label">{{__('Compensation & Other Benefits')}}</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->benefits)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->read_before_apply)))
                <div class="info">
                    <strong class="label">{{__('Read Before Apply')}}</strong>
                    <div class="desc">
                        {!! replaceBaseUrl(convertUtf8($job->read_before_apply)) !!}
                    </div>
                </div>
                @endif
                @if (!empty(convertUtf8($job->email)))
                <div class="info">
                    <strong class="label">{{__('Email Address')}}</strong>
                    <div class="desc">
                        {{__('Send your CV to')}} <strong class="text-danger">{{ convertUtf8($job->email) }}</strong>.
                    </div>
                </div>
                @endif
              </div>
           </div>
           <!--    career sidebar start   -->
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
                      <li class="single-category">
                          <a href="{{route('front.career')}}">{{__('All')}} <span>({{$jobscount}})</span></a>
                      </li>
                      @foreach ($jcats as $key => $jcat)
                        <li class="single-category {{$job->jcategory->id == $jcat->id ? 'active' : ''}}">
                            <a href="{{route('front.career', ['category' => $jcat->id, 'term'=>request()->input('term')])}}">{{convertUtf8($jcat->name)}} <span>({{$jcat->jobs()->count()}})</span></a>
                        </li>
                      @endforeach
                   </ul>
                </div>
             </div>
           </div>
           <!--    service sidebar end   -->
        </div>
     </div>
  </div>
  <!--    job details section end   -->

@endsection
