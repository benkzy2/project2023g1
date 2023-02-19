@extends('front.layout')

@section('pagename')
 - {{convertUtf8($page->name)}}
@endsection

@section('meta-keywords', "$page->meta_keywords")
@section('meta-description', "$page->meta_description")

@section('content')
  <!--====== PAGE TITLE PART START ======-->

  <section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
   <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <div class="page-title-item text-center">
                   <h2 class="title">{{convertUtf8($page->title)}}</h2>
                   <nav aria-label="breadcrumb">
                       <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                           <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($page->name)}}</li>
                       </ol>
                   </nav>
               </div>
           </div>
       </div>
   </div>
</section>


<section class="experience-area-3 pt-100 pb-90">
   <div class="container">
      <div class="col-lg-12 col-md-12 col-sm-12">
         {!! nl2br(replaceBaseUrl(convertUtf8($page->body))) !!}
      </div>
   </div>
</section>

<!--====== EXPERIENCE PART ENDS ======-->
@endsection
