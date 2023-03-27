<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Copy</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'VT323', monospace;
        }
        .receipt-title {
            text-align: center;
            border-bottom: 1px dashed #000;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        .my-0 {
            margin-bottom: 0px;
            margin-top: 0px;
        }
        .mb-0 {
            margin-bottom: 0px;
        }
        .mt-0 {
            margin-top: 0px;
        }
        p, h1, h2, h3, h4, h5, h6 {
            margin: 0;
        }
        .cart-item .item {
            display: flex;
        }

        .cart-item .item .qty {
            margin-right: 29px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .order-summary {
            border-top: 1px dashed #000;
            padding-top: 15px;
        }

        .order-summary .info {
            display: flex;
            justify-content: space-between;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .order-summary .info.total {
            font-size: 18px;
        }
        .item-name {
            max-width: 190px;
        }
        .serving-method {
            position: absolute;
            border: 2px dashed #000000;
            font-size: 20px;
            font-weight: 500;
            padding: 2px 5px;
            transform: rotate(-54deg);
            top: 46px;
            left: 2px;
        }
    </style>
</head>
<body>

    <div>
        <div class="receipt-title">
            @if (Session::has('pos_serving_method') && !empty(Session::get('pos_serving_method')))
            <div class="serving-method">{{Session::get('pos_serving_method')}}</div>
            @endif
            <h2 class="my-0">{{$bs->website_title}}</h2>
            <span class="my-0">(Customer Copy)</span>
            @php
            $addresses = explode(PHP_EOL, $bs->contact_address);
            @endphp

            <p class="my-0" style="max-width: 200px; margin: 0 auto;">{{$addresses[0]}}</p>
            <p class="my-0">{{\Carbon\Carbon::now()}}</p>
            <p class="my-0">{{request()->getHttpHost()}}</p>
        </div>

        @if (!empty($cart))
        <div id="cartTable">

            @foreach ($cart as $key => $item)
            @php
            $id = $item["id"];
            $product = App\Models\Product::findOrFail($id);
            @endphp
            <div class="cart-item">
                <div class="item">
                    <div class="qty">
                        {{$item['qty']}} X
                    </div>
                    <div class="item-name">
                        <p class="text-white">{{convertUtf8($item['name'])}}</p>
                        @if (!empty($item["variations"]))
                            <p>{{__("Variation")}}: <br>
                                @php
                                    $variations = $item["variations"];
                                @endphp
                                @foreach ($variations as $vKey => $variation)
                                    <span class="text-capitalize">{{str_replace("_"," ",$vKey)}}:</span> {{$variation["name"]}}
                                    @if (!$loop->last)
                                    ,
                                    @endif
                                @endforeach    
                            </p>
                        @endif
                        @if (!empty($item["addons"]))
                        <p>
                            {{__("Add On's")}}:
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
                </div>
                <div class="item-total">
                    {{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}
                    {{$item['total']}}
                    {{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}
                </div>
            </div>
            @endforeach

        </div>

        <div class="order-summary">
            <div class="info">
                <div>Subtotal:</div>
                <div>
                    {{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}
                    {{posCartSubTotal()}}
                    {{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}
                </div>
            </div>
            <div class="info">
                <div>Tax:</div>
                <div>
                    +
                    {{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}
                    {{posTax()}}
                    {{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}
                </div>
            </div>
            <div class="info">
                <div>Delivery Charge:</div>
                <div>
                    +
                    {{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}
                    {{posShipping()}}
                    {{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}
                </div>
            </div>
            <div class="info total">
                <div>Total:</div>
                <div>
                    {{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}
                    {{posCartSubTotal() + posTax() + posShipping()}}
                    {{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}
                </div>
            </div>
        </div>

        @endif
    </div>

</body>
</html>
