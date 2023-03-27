@extends('front.layout')

@section('content')
<!--   hero area start   -->
<section class="page-title-area d-flex align-items-center lazy" data-bg="{{asset('assets/front/img/'.$bs->breadcrumb)}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{convertUtf8($bs->checkout_title)}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('front.index')}}"><i class="flaticon-home"></i>{{__('Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{convertUtf8($bs->checkout_title)}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== PAGE TITLE PART ENDS ======-->
<!--   hero area end    -->
    <!--====== CHECKOUT PART START ======-->
    <section class="checkout-area">
        <form action="" method="POST" id="payment" enctype="multipart/form-data">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col-12 mb-5">
                        <div class="table">
                            <div class="shop-title-box">
                                <h3>{{ __('Serving Method') }}</h3>
                            </div>
                            <table class="cart-table shipping-method">
                                <thead class="cart-header">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('Method') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($smethods as $sm)
                                        <tr>
                                            <td>
                                                <input type="radio" name="serving_method" class="shipping-charge"
                                                value="{{$sm->value}}"
                                                @if(empty(old()) && $loop->first)
                                                    checked
                                                @elseif(old('serving_method') == $sm->value)
                                                    checked
                                                @endif
                                                data-gateways="{{$sm->gateways}}">
                                            </td>
                                            <td>
                                                <p class="mb-1"><strong>{{ __($sm->name) }}</strong></p>
                                                <p class="mb-0"><small>{{ __($sm->note) }}</small></p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @error('serving_method')
                            <p class="text-danger mb-0">{{ convertUtf8($message) }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <input type="hidden" name="ordered_from" value="website">
                <div class="form-container" id="home_delivery">
                    @includeIf('front.qrmenu.partials.home_delivery_form')
                </div>
                <div class="form-container d-none" id="pick_up">
                    @includeIf('front.qrmenu.partials.pick_up_form')
                </div>
                <div class="form-container d-none" id="on_table">
                    @includeIf('front.qrmenu.partials.on_table_form')
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="field-label">{{ __('Order Notes') }} </div>
                        <div class="field-input">
                            <textarea name="order_notes" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div id="paymentInputs"></div>
            </div>
            <div class="bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
                            <div class="table">
                                <div class="shop-title-box">
                                    <h3>{{ __('Order Summary') }}</h3>
                                </div>
                                @if (!empty($cart))
                                <table class="cart-table">
                                    <thead class="cart-header">
                                        <tr>
                                            <th class="prod-column" width="10%">{{ __('Product') }}</th>
                                            <th width="70%">{{ __('Product Title') }}</th>
                                            <th>{{ __('Quantity') }}</th>
                                            <th>{{ __('Total') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart as $key => $item)
                                        @php
                                        $id = $item["id"];
                                        $product = App\Models\Product::findOrFail($id);
                                        @endphp
                                        <tr class="remove{{ $id }}">
                                            <td class="prod-column" width="10%">
                                                <div class="column-box">
                                                    <div class="prod-thumb">
                                                        <img class="lazy" data-src="{{ asset('assets/front/img/product/featured/' . $item['photo']) }}"
                                                            alt="" width="100">
                                                    </div>
                                                </div>
                                            </td>
                                            <td width="70%">
                                                <div class="title">
                                                    <h5 class="prod-title">{{ convertUtf8($item['name']) }}</h5>
                                                    @if (!empty($item['variations']))
                                                    <p><strong>{{ __('Variations') }}:</strong>
                                                        {{ $item['variations']['name'] }}
                                                    </p>
                                                    @endif
                                                    @if (!empty($item['addons']))
                                                    <p>
                                                        <strong>{{ __("Add On's") }}:</strong>
                                                        @php
                                                        $addons = $item["addons"];
                                                        @endphp
                                                        @foreach ($addons as $addon)
                                                        {{ $addon['name'] }}
                                                        @if (!$loop->last)
                                                        ,
                                                        @endif
                                                        @endforeach
                                                    </p>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="qty">
                                                {{ $item['qty'] }}
                                            </td>
                                            <input type="hidden" value="{{ $id }}" class="product_id">
                                            <td class="sub-total">
                                                {{ $be->base_currency_symbol_position == 'left' ? $be->base_currency_symbol : '' }}
                                                {{ $item['total'] }}
                                                {{ $be->base_currency_symbol_position == 'right' ? $be->base_currency_symbol : '' }}
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <div class="py-5 bg-light text-center">
                                            <h5>{{ __('Cart is empty!') }}</h5>
                                        </div>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="text-center my-4">
                                    <a href="{{ route('front.index') }}"
                                        class="main-btn main-btn-2">{{ __('Return to Website') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">

                            @includeIf('front.qrmenu.partials.order_total')
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!--====== CHECKOUT PART ENDS ======-->
@endsection


@section('script')
@includeIf('front.qrmenu.partials.scripts')
@endsection
