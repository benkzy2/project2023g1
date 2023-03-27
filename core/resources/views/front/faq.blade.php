@extends("front.layout")


@section('content')
<!--====== PAGE TITLE PART START ======-->

<section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/'.$bs->breadcrumb)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($be->faq_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('FAQ')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<!--====== PAGE TITLE PART ENDS ======-->


<!--   FAQ section start   -->
<div class="faq-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-6">
            <div class="accordion" id="accordionExample1">
               @for ($i=0; $i < ceil(count($faqs)/2); $i++)
               <div class="card">
                  <div class="card-header" id="heading{{$faqs[$i]->id}}">
                     <h2 class="mb-0">
                        <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$faqs[$i]->id}}" aria-expanded="false" aria-controls="collapse{{$faqs[$i]->id}}">
                        {{convertUtf8($faqs[$i]->question)}}
                        </button>
                     </h2>
                  </div>
                  <div id="collapse{{$faqs[$i]->id}}" class="collapse" aria-labelledby="heading{{$faqs[$i]->id}}" data-parent="#accordionExample1">
                     <div class="card-body">
                        {{convertUtf8($faqs[$i]->answer)}}
                     </div>
                  </div>
               </div>
               @endfor
            </div>
         </div>
         <div class="col-lg-6">
            <div class="accordion" id="accordionExample2">
               @for ($i=ceil(count($faqs)/2); $i < count($faqs); $i++)
               <div class="card">
                  <div class="card-header" id="heading{{$faqs[$i]->id}}">
                     <h2 class="mb-0">
                        <button class="btn btn-link collapsed btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$faqs[$i]->id}}" aria-expanded="false" aria-controls="collapse{{$faqs[$i]->id}}">
                        {{convertUtf8($faqs[$i]->question)}}
                        </button>
                     </h2>
                  </div>
                  <div id="collapse{{$faqs[$i]->id}}" class="collapse" aria-labelledby="heading{{$faqs[$i]->id}}" data-parent="#accordionExample2">
                     <div class="card-body">
                        {{convertUtf8($faqs[$i]->answer)}}
                     </div>
                  </div>
               </div>
               @endfor
            </div>
         </div>
      </div>
   </div>
</div>
<!--   FAQ section end   -->
@endsection
