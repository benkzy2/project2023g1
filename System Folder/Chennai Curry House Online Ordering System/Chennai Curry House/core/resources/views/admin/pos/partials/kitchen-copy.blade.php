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
            font-size: 16px;
        }
        .order-summary {
            border-top: 1px dashed #000;
            padding-top: 15px;
        }

        .order-summary .info {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        .order-summary .info.total {
            font-size: 24px;
        }
    </style>
</head>
<body>

    <div>
        <div class="receipt-title">
            <h2 class="my-0">{{$bs->website_title}}</h2>
            <span class="my-0">(Kitchen Copy)</span>
            <p class="my-0">{{\Carbon\Carbon::now()}}</p>
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
            </div>
            @endforeach

        </div>


        @endif
    </div>

</body>
</html>
