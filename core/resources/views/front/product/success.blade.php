@extends('front.layout')


@section('content')

<!--   hero area start   -->
<section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__("Success")}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__("Success")}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== PAGE TITLE PART ENDS ======-->

  <div class="checkout-message">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                    <div class="checkout-success">
                        <div class="icon text-success"><i class="far fa-check-circle"></i></div>
                        <h2>{{__('Success')}}!</h2>
                        @if (!empty($order->token_no))
                        <p class="mb-0">{{__('Token No')}}:
                            <strong class="text-danger">
                                {{$order->token_no}}
                            </strong>
                        </p>
                        @endif
                        <p class="mb-0">{{__('Order Number')}}: <strong class="text-danger">#{{$orderNum ?? ''}}</strong></p>
                        <p class="mb-0">{{__('We have sent you a mail with an invoice.')}}</p>
                        <p class="mt-3">{{__('Thank you.')}}</p>
                        <a class="main-btn main-btn-2 mt-4" href="{{route('front.index')}}">{{__('Return to Website')}}</a>
                    </div>
              </div>
          </div>
      </div>
  </div>

@endsection
