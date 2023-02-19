@extends('front.layout')

@section('content')
    <!--====== PAGE TITLE PART START ======-->
    <section class="page-title-area d-flex align-items-center" style="background-image:url('{{asset('assets/front/img/'.$bs->breadcrumb)}}')">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title">{{convertUtf8($bs->items_title)}}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($bs->items_title)}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====== PAGE TITLE PART ENDS ======-->

    <!--====== SHOP BAR PART START ======-->

    <div class="shop-bar-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-search mt-30">
                        <input type="text" placeholder="{{__('Search Keywords')}}" class="input-search" name="search" value="">
                        <i class="fas fa-search input-search-btn cursor-pointer"></i>
                    </div>
                </div>

                <div class="col-lg-6"></div>

                <div class="col-lg-3">
                    <div class="shop-dropdown mt-30 float-right">
                        <select name="type" id="type_sort">
                           <option value="new" {{ request()->input('type') == 'new' ? 'selected' : '' }}>{{__('Newest Product')}}</option>
                           <option value="old" {{ request()->input('type') == 'old' ? 'selected' : '' }}>{{__('Oldest Product')}}</option>
                           <option value="high-to-low" {{ request()->input('type') == 'high-to-low' ? 'selected' : '' }}>{{__('Price: High To Low')}}</option>
                           <option value="low-to-high" {{ request()->input('type') == 'low-to-high' ? 'selected' : '' }}>{{__('Price: Low To High')}}</option>
                        </select>
                     </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== SHOP BAR PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section class="pricing-area pt-20 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-box shop-category">
                           <div class="sidebar-title">
                              <h4 class="title">{{__('Category')}}</h4>
                           </div>
                           <div class="category-item">
                              <ul>
                                <li class="{{ request()->input('category_id') == '' ? 'active-search' : '' }}" ><a data-href="0" class="category-id cursor-pointer">{{__('All')}}</a></li>
                                @foreach ($categories as $category)
                                <li class="{{ request()->input('category_id') == $category->id ? 'active-search' : '' }}"><a data-href="{{$category->id}}" class="category-id cursor-pointer">{{convertUtf8($category->name)}}</a></li>
                                @endforeach
                              </ul>
                           </div>
                        </div>

                        <div class="shop-box shop-filter mt-30">
                           <div class="sidebar-title">
                              <h4 class="title">{{__('Filter Products')}}</h4>
                           </div>
                           <div class="filter-item">
                            <ul class="checkbox_common checkbox_style2">
                                <li>
                                    <input type="radio" class="review_val" name="review_value"
                                    {{request()->input('review') == '' ? 'checked' : ''}}
                                    id="checkbox4" value="">
                                    <label for="checkbox4"><span></span> {{__('Show All')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox5" value="4" {{request()->input('review') == 4 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox5"><span></span>4 {{__('Star and higher')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox6" value="3" {{request()->input('review') == 3 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox6"><span></span>3 {{__('Star and higher')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox7" value="2" {{request()->input('review') == 2 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox7"><span></span>2 {{__('Star and higher')}}</label>
                                </li>

                                <li>
                                    <input type="radio" class="review_val" name="review_value" id="checkbox8" value="1" {{request()->input('review') == 1 ? 'checked' : ''}}
                                    id="checkbox4" value="all">
                                    <label for="checkbox8"><span></span>1 {{__('Star and higher')}}</label>
                                </li>
                            </ul>
                           </div>
                        </div>
                        <div class="shop-box shop-price mt-30">
                           <div class="sidebar-title">
                              <h4 class="title">{{__('Filter By Price')}}</h4>
                           </div>
                           <div class="price-item">
                              <div class="price-range-box ">
                                 <form action="#">
                                    <div id="slider-range"></div>
                                    <span>Price: </span>
                                    <input type="text" name="text" id="amount">
                                    <button class="btn filter-button" type="button">{{__('Filter')}}</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row justify-content-start">
                        @if($products->count() > 0)
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-7 col-sm-8">
                            <div class="single-pricing text-center mt-30">
                                @if ($product->is_special == 1)
                                <div class="flag">
                                    <span>{{__('Special')}}</span>
                                </div>
                                @endif
                                <a class="pricing-thumb" href="{{route('front.product.details',[$product->slug,$product->id])}}">
                                    <img src="{{asset('assets/front/img/product/featured/'.$product->feature_image)}}" alt="">
                                </a>
                                <h3 class="title">{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}{{convertUtf8($product->current_price)}}{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}

                                @if(convertUtf8($product->previous_price))
                                <small>
                                    <del>{{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}} {{convertUtf8($product->previous_price)}} {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</del>
                                </small>
                                @endif

                                </h3>
                                <a href="{{route('front.product.details',[$product->slug,$product->id])}}"><span>{{convertUtf8($product->title)}}</span></a>
                                <p> {{convertUtf8(strlen($product->summary)) > 48 ? convertUtf8(substr($product->summary, 0, 48)) . '...' : convertUtf8($product->summary)}}</p>
                                <a class="main-btn cart-link" data-href="{{route('add.cart',$product->id)}}">{{__('Add To Cart')}}</a>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-lg-12">
                            <div class="bg-light py-5 mt-4">
                                <h4 class="text-center">{{__('Product Not Found')}}</h4>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            {{ $products->appends(['minprice' => request()->input('minprice'), 'maxprice' => request()->input('maxprice'), 'category_id' => request()->input('category_id'), 'type' => request()->input('type'), 'tag' => request()->input('tag'), 'review' => request()->input('review')])->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @php
    $maxprice = App\Models\Product::max('current_price');
    $minprice = 0;
    @endphp
    <form id="searchForm" class="d-none"  action="{{ route('front.items') }}" method="get">
        <input type="hidden" id="search" name="search" value="{{ !empty(request()->input('search')) ? request()->input('search') : '' }}">
        <input type="hidden" id="minprice" name="minprice" value="{{ !empty(request()->input('minprice')) ? request()->input('minprice') : $minprice }}">
        <input type="hidden" id="maxprice" name="maxprice" value="{{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice }}">
        <input type="hidden" name="category_id" id="category_id" value="{{ !empty(request()->input('category_id')) ? request()->input('category_id') : null }}">
        <input type="hidden" name="type" id="type" value="{{ !empty(request()->input('type')) ? request()->input('type') : 'new' }}">

        <input type="hidden" name="review" id="review" value="{{ !empty(request()->input('review')) ? request()->input('review') : '' }}">
        <button id="search-button" type="submit"></button>
    </form>

    <!--====== PRICING PART ENDS ======-->

    <!--====== SHOP BAR PART START ======-->



@endsection


@section('script')
<script>
    "use strict";
    var position = "{{$be->base_currency_symbol_position}}";
    var symbol = "{{$be->base_currency_symbol}}";
    var sliderMinPrice = '{{ !empty(request()->input('minprice')) ? request()->input('minprice') : $minprice }}';
    var sliderMaxPrice = '{{ !empty(request()->input('maxprice')) ? request()->input('maxprice') : $maxprice }}';
    var sliderInitMax = '{{$maxprice }}';


</script>
<script src="{{asset('assets/front/js/items.js')}}"></script>
@endsection
