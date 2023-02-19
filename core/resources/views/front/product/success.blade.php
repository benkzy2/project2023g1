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
                      <p>{{__('Your order has been placed successfully!')}}</p>
                      <p>{{__('We have sent you a mail with an invoice.')}}</p>
                      <p class="mt-4">{{__('Thank you.')}}</p>
                  </div>
              </div>
          </div>
      </div>
  </div>

@endsection
