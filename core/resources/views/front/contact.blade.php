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

@endsection
