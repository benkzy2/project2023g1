@extends('front.layout')

@section('pagename')
 -
 {{__('Product')}}
@endsection


@section('styles')
<link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.min.css')}}">
@endsection


@section('content')


  <section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/' . $bs->breadcrumb)}}" style="background-size: cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($bs->cart_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($bs->cart_title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== PAGE TITLE PART ENDS ======-->

<!--====== SHOPPING CART PART START ======-->

<section class="cart-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div id="refreshDiv">
                    @if($cart != null)
                        <ul class="total-item-info">
                            @php
                                $cartTotal = 0;
                                $countitem = 0;
                                if($cart){
                                foreach($cart as $p){
                                    $cartTotal += $p['total'];
                                    $countitem += $p['qty'];
                                }
                            }
                            @endphp
                            <li><span>{{__('Your Cart')}}:</span> <span class="cart-item-view">{{$cart ? $countitem : 0}}</span> {{__('Items')}}</li>
                            <li style="direction: ltr;"><span>{{__('Total')}} :</span> {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}} <span class="cart-total-view">{{$cartTotal}}</span> {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}</li>
                        </ul>

                    @endif
                    <div class="table-outer">
                        @if($cart != null)
                        <table class="cart-table">
                            <thead class="cart-header">
                                <tr>
                                    <th class="prod-column">{{__('Product')}}</th>
                                    <th>{{__('Product Title')}}</th>
                                    <th>{{__('Quantity')}}</th>
                                    <th class="price">{{__('Price')}}</th>
                                    <th>{{__('Total')}}</th>
                                    <th>{{__('Remove')}}</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cart as $key => $item)
                                @php
                                    $id = $item["id"];
                                    $product = App\Models\Product::findOrFail($id);
                                @endphp
                                <tr class="remove{{$id}}">

                                    <td class="prod-column">
                                        <div class="column-box">
                                            <div class="prod-thumb">
                                                <a href="{{route('front.product.details',[$product->slug,$product->id])}}">
                                                    <img src="{{asset('assets/front/img/product/featured/'.$item['photo'])}}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="title">
                                            <a target="_blank" href="{{route('front.product.details',[$product->slug,$product->id])}}">
                                                <h5 class="prod-title">{{convertUtf8($item['name'])}}</h5>
                                            </a>
                                            @if (!empty($item["variations"]))
                                                <p><strong>{{__("Variation")}}:</strong> {{$item["variations"]["name"]}}</p>
                                            @endif
                                            @if (!empty($item["addons"]))
                                                <p>
                                                    <strong>{{__("Add On's")}}:</strong>
                                                    @php
                                                        $addons = $item["addons"];
                                                    @endphp
                                                    @foreach ($addons as $addon)
                                                        {{$addon["name"]}}
                                                        @if (!$loop->last)
                                                        ,
                                                        @endif
                                                    @endforeach
                                                </p>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="qty">
                                        <div class="product-quantity d-flex" id="quantity">
                                            <button type="button" id="sub" class="sub">-</button>
                                            <input type="text" class="cart_qty" id="1" value="{{$item['qty']}}" />
                                            <button type="button" id="add" class="add">+</button>
                                        </div>
                                    </td>
                                    <input type="hidden" value="{{$id}}" class="product_id">
                                    <td class="price cart_price">
                                        <p>
                                            <strong>{{__("Product")}}:</strong>
                                            {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}<span>{{$item['product_price'] * $item["qty"]}}</span>{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                        </p>
                                        @if (!empty($item['variations']))
                                            <p>

                                                <strong>{{__("Variation")}}: </strong>
                                                {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}<span>{{$item['variations']['price'] * $item["qty"]}}</span>{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                            </p>
                                        @endif
                                        @if (!empty($item['addons']))
                                            <p>
                                                <strong>{{__("Add On's")}}: </strong>
                                                @php
                                                    $addons = $item['addons'];
                                                    $addonTotal = 0;
                                                    foreach ($addons as $addon) {
                                                        $addonTotal += $addon["price"];
                                                    }
                                                @endphp
                                                {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}<span>{{$addonTotal * $item["qty"]}}</span>{{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                            </p>
                                        @endif
                                    </td>
                                    <td class="sub-total">
                                        {{$be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : ''}}
                                        {{$item['total']}}
                                        {{$be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : ''}}
                                    </td>
                                    <td>
                                        <div class="remove">
                                            <div class="checkbox">
                                            <span class="fas fa-times item-remove" data-href="{{route('cart.item.remove',$key)}}"></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @else
                            <div class="bg-light py-5 text-center">
                                <h3 class="text-uppercase">{{__('Cart is empty!')}}</h3>
                            </div>
                        @endif
                    </div>
                    @if ($cart != null)
                        <div class="row cart-middle">
                            <div class="col-lg-6 offset-lg-6 col-sm-12">
                                <div class="update-cart float-right d-inline-block ml-4">
                                    <a class="main-btn main-btn-2 proceed-checkout-btn" href="{{route('front.checkout')}}"><span>{{__('Checkout')}}</span></a>
                                </div>
                                <div class="update-cart float-right d-inline-block">
                                    <button class="main-btn main-btn-2" id="cartUpdate" data-href="{{route('cart.update')}}" type="button"><span>{{__('Update Cart')}}</span></button>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>

<!--====== SHOPPING CART PART ENDS ======-->

@endsection


@section('scripts')
<script>
    "use strict";
    var symbol = "{{$be->base_currency_symbol}}";
    var position = "{{$be->base_currency_symbol_position}}";
</script>
<script src="{{asset('assets/front/js/jquery.ui.js')}}"></script>
<script src="{{asset('assets/front/js/product.js')}}"></script>
<script src="{{asset('assets/front/js/cart.js')}}"></script>
@endsection
