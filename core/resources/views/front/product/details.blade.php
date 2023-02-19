@extends('front.layout')

@section('content')
    <!--====== PAGE TITLE PART START ======-->

    <section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{convertUtf8($bs->menu_details_title)}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($product->title)}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SHOP DETAILS PART START ======-->

    <section class="shop-details-area pt-95 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="shop-item mr-70">
                        <div class="shop-thumb">
                            @foreach ($product->product_images as $image)
                            <div class="item">
                                <img src="{{asset('assets/front/img/product/sliders/'.$image->image)}}" alt="shop">
                            </div>
                            @endforeach
                        </div>
                        <div class="shop-list">
                            <ul class="shop-thumb-active">
                                @foreach ($product->product_images as $img)
                                <li><img src="{{asset('assets/front/img/product/sliders/'.$img->image)}}" alt="shop"></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="shop-content pt-60">
                        <div class="shop-top-content">
                            <h3 class="title">{{convertUtf8($product->title)}}</h3>
                            <ul class="d-flex justify-content-between">
                                <li>
                                    <div class="rate">
                                        <div class="rating" style="width:{{!empty($product->product_reviews) ? $product->product_reviews()->avg('review') * 20 : 0}}%"></div>
                                    </div>
                                </li>
                                <li><span>{{count($reviews)}} {{__('Reviews(S)')}}</span></li>
                            </ul>
                        </div>
                        <div class="shop-price pt-15">
                            <ul>
                                <li>{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->current_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</li>
                                @if(convertUtf8($product->previous_price))
                                <li>{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->previous_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</li>
                                @endif
                            </ul>
                            <span>{{__('Availability')}} :
                                @if($product->stock != 0)
                                <span class='text-success'>{{__('IN STOCK')}}</span>
                                @else
                                <span class='text-danger'>{{__('OUT OF STOCK')}}</span>
                                @endif
                        </span>
                        </div>
                        <div class="shop-qty d-flex align-items-center pt-25">
                            <div class="product-quantity d-flex align-items-center" id="quantity">
                                <span>{{__('Qty')}}</span>
                                <button type="button" id="sub" class="sub subclick">-</button>
                                <input type="text" class="cart-amount" id="1" value="1" />
                                <button type="button" id="add" class="add addclick">+</button>
                            </div>
                            <div class="shop-review pl-40">
                                <ul>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="shop-text">
                            <p>{{$product->summary}}</p>
                        </div>
                        <div class="shop-social product-social-icon social-link a2a_kit a2a_kit_size_32">
                            <span>{{__('Share')}} :</span>
                            <ul class="social-share">
                                <li>
                                    <a class="facebook a2a_button_facebook" href="">
                                      <i class="fab fa-facebook-f"></i>
                                    </a>
                                  </li>
                                    <li>
                                        <a class="twitter a2a_button_twitter" href="">
                                          <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="linkedin a2a_button_linkedin" href="">
                                          <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="pinterest a2a_button_pinterest" href="">
                                          <i class="fab fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>

                                    <a class="a2a_dd plus" href="https://www.addtoany.com/share">
                                        <i class="fas fa-plus"></i>
                                      </a>
                                    </li>
                            </ul>
                        </div>

                        <div class="shop-btns pt-45">
                            <a data-href="{{route('add.cart',$product->id)}}" class="main-btn-2 main-btn cart-link ">{{__('Add To Cart')}}  <i class="fa fa-shopping-basket"></i></a>
                            <form class="d-inline-block ml-2" method="GET" action="{{route('front.product.checkout',$product->slug)}}">
                                <input type="hidden" value="" name="qty" id="order_click_with_qty">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== SHOP DETAILS PART ENDS ======-->

    <!--====== SHOP DETAILS PART ENDS ======-->

    <div class="shop-menu-content pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="menu-contents">
                        <div class="menu-tabs">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{__('Description')}}</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">{{__('Reviews')}}</a>
                              </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                  {!! nl2br(replaceBaseUrl(convertUtf8($product->description))) !!}
                              </div>
                              <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="shop-review-area">
                                    <div class="shop-review-title">
                                        <h3 class="title">{{count($reviews)}} {{__('Reviews For')}} {{convertUtf8($product->title)}}</h3>
                                    </div>
                                        @foreach ($reviews as $review)
                                        <div class="shop-review-user">
                                            <img  src="{{ !empty($review->user) ? asset('assets/front/img/user/'.$review->user->photo) : asset('assets/front/img/user/profile.jpg') }}" width="60">
                                            <ul>
                                                <div class="rate">
                                                    <div class="rating" style="width:{{$review->review * 20}}%"></div>
                                                </div>
                                            </ul>
                                            <span><span>{{!empty(convertUtf8($review->user)) ? convertUtf8($review->user->username) : ''}}</span> – {{$review->created_at->format('F j, Y')}}</span>
                                            <p>{{convertUtf8($review->comment)}}</p>
                                        </div>
                                        @endforeach
                                        @if(Auth::user())
                                            @if(App\Models\OrderItem::where('user_id',Auth::user()->id)->where('product_id',$product->id)->exists())
                                        <div class="shop-review-form">
                                            @error('error')
                                            <p class="text-danger my-2">{{Session::get('error')}}</p>
                                            @enderror
                                            <form action="{{route('product.review.submit')}}" method="POST">@csrf
                                                <div class="input-box">
                                                    <span>{{__('Comment')}} *</span>
                                                    <textarea name="comment"  cols="30" rows="10" placeholder="{{__('Comment')}} *"></textarea>
                                                </div>
                                                <input type="hidden" value="" id="reviewValue" name="review">
                                                <input type="hidden" value="{{$product->id}}" name="product_id">
                                                <div class="input-box">
                                                    <span>{{__('Rating')}} *</span>
                                                    <div class="review-content ">
                                                    <ul class="review-value review-1">
                                                        <li><a class="cursor-pointer" data-href="1"><i class="far fa-star"></i></a></li>
                                                    </ul>
                                                    <ul class="review-value review-2">
                                                        <li><a class="cursor-pointer" data-href="2"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="2"><i class="far fa-star"></i></a></li>
                                                    </ul>
                                                    <ul class="review-value review-3">
                                                        <li><a class="cursor-pointer" data-href="3"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="3"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="3"><i class="far fa-star"></i></a></li>
                                                    </ul>
                                                    <ul class="review-value review-4">
                                                        <li><a class="cursor-pointer" data-href="4"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="4"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="4"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="4"><i class="far fa-star"></i></a></li>
                                                    </ul>
                                                    <ul class="review-value review-5">
                                                        <li><a class="cursor-pointer" data-href="5"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="5"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="5"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="5"><i class="far fa-star"></i></a></li>
                                                        <li><a class="cursor-pointer" data-href="5"><i class="far fa-star"></i></a></li>
                                                    </ul>
                                                </div>
                                                </div>
                                                <div class="input-btn mt-3">
                                                    <button type="submit" class="main-btn">{{__('Submit')}}</button>
                                                </div>
                                            </form>
                                        </div>
                                        @endif
                                        @else
                                        <div class="review-login mt-5">
                                            <a class="boxed-btn d-inline-block mr-2" href="{{route('user.login')}}">{{__('Login')}}</a> {{__('to leave a rating')}}
                                        </div>
                                        @endif
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== SHOP DETAILS PART ENDS ======-->
@endsection


@section('script')
<script src="{{asset('assets/front/js/page.js')}}"></script>
@endsection
