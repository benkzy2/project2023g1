<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    .container{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}@media (min-width:576px){.container{max-width:540px}}@media (min-width:768px){.container{max-width:720px}}@media (min-width:992px){.container{max-width:960px}}@media (min-width:1200px){.container{max-width:1140px}}.container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto}.row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}@media (min-width:992px){.col-lg-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-lg-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}}.table{width:100%;max-width:100%;margin-bottom:1rem;background-color:transparent}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}.table tbody+tbody{border-top:2px solid #dee2e6}.table .table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered{border:1px solid #dee2e6}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive>.table-bordered{border:0}.bg-primary{background-color:#007bff!important}a.bg-primary:focus,a.bg-primary:hover,button.bg-primary:focus,button.bg-primary:hover{background-color:#0062cc!important}.text-center{text-align:center!important}
    </style>
</head>
<body>
    <div class="order-comfirmation">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo text-center" style="margin-bottom: 20px; padding-top: 30px;">
                        <img src="{{asset('assets/front/img/' . $bs->logo)}}" alt="">
                    </div>
                    <div class="confirmation-message bg-primary" style="padding: 0px;margin-bottom: 20px;">
                        <h2 class="text-center"><strong style="color: white;">{{__('ORDER INVOICE')}}</strong></h2>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <h3><strong>Order Details</strong></h3>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    @if (!empty($order->token_no))
                                    <tr>
                                      <th scope="row">Token No:</th>
                                      <td>#{{$order->token_no}}</td>
                                    </tr>
                                    @endif
                                  <tr>
                                    <th scope="row">Order Number:</th>
                                    <td>#{{$order->order_number}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Order Date:</th>
                                    <td>{{$order->created_at->format('d-m-Y')}}</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">{{__('Serving Method')}}:</th>
                                    <td>
                                        @if(strtolower($order->serving_method) == 'on_table')
                                            {{__('On Table')}}
                                        @elseif(strtolower($order->serving_method) == 'home_delivery')
                                            {{__('Home Delivery')}}
                                        @elseif(strtolower($order->serving_method) == 'pick_up')
                                            {{__('Pick up')}}
                                        @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Payment Method:</th>
                                    <td class="text-capitalize">
                                       {{$order->method}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <th scope="row">Payment Status:</th>
                                    <td class="text-capitalize">
                                       {{$order->payment_status}}
                                    </td>
                                  </tr>
                                  @if (!empty($order->shipping_method))
                                    <tr>
                                        <th scope="row">Shipping Method:</th>
                                        <td class="text-capitalize">
                                        {{$order->shipping_method}}
                                        </td>
                                    </tr>
                                  @endif
                                  @if (!empty($order->shipping_method))
                                  <tr>
                                    <th scope="row">Shipping Charge:</th>
                                    <td class="text-capitalize">
                                      <span>{{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}</span> {{$order->shipping_charge}} <span>{{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}</span>
                                    </td>
                                  </tr>
                                  @endif
                                  <tr>
                                    <th scope="row">Grand Total:</th>
                                    <td class="text-capitalize">
                                        <span>{{$be->base_currency_text_position == 'left' ? $be->base_currency_text : ''}}</span>  {{$order->total}} <span>{{$be->base_currency_text_position == 'right' ? $be->base_currency_text : ''}}</span>
                                    </td>
                                  </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div>
                                <h3>
                                    <strong>
                                        @if ($order->serving_method == 'home_delivery')
                                            Billing Details
                                        @else
                                            Information
                                        @endif
                                    </strong>
                                </h3>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    @if (!empty($order->billing_lname))
                                        <tr>
                                            <th scope="row">Billing Name:</th>
                                            <td>{{$order->billing_fname }} {{$order->billing_lname}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($order->billing_email))
                                        <tr>
                                            <th scope="row">Billing Email:</th>
                                            <td>{{$order->billing_email}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($order->billing_number))
                                        <tr>
                                            <th scope="row">Billing Number:</th>
                                            <td>{{$order->billing_number}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($order->billing_address))
                                        <tr>
                                            <th scope="row">Billing Address:</th>
                                            <td>{{$order->billing_address}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($order->billing_city))
                                        <tr>
                                            <th scope="row">Billing City:</th>
                                            <td>{{$order->billing_city}}</td>
                                        </tr>
                                    @endif
                                    @if (!empty($order->billing_country))
                                        <tr>
                                            <th scope="row">Billing Country:</th>
                                            <td>{{$order->billing_country}}</td>
                                        </tr>
                                    @endif

                                    @if ($order->serving_method == 'on_table')
                                        @if (!empty($order->table_number))
                                            <tr>
                                                <th scope="row">Table Number:</th>
                                                <td>{{$order->table_number}}</td>
                                            </tr>
                                        @endif
                                        @if (!empty($order->waiter_name))
                                            <tr>
                                                <th scope="row">Waiter Name:</th>
                                                <td>{{$order->waiter_name}}</td>
                                            </tr>
                                        @endif
                                    @endif

                                    @if ($order->serving_method == 'pick_up')
                                        @if (!empty($order->pick_up_date))
                                            <tr>
                                                <th scope="row">Pick up Date:</th>
                                                <td>{{$order->pick_up_date}}</td>
                                            </tr>
                                        @endif
                                        @if (!empty($order->pick_up_time))
                                            <tr>
                                                <th scope="row">Pick up Time:</th>
                                                <td>{{$order->pick_up_time}}</td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if ($order->serving_method == 'home_delivery')
                        <div class="col-lg-6">
                            <div>
                                <h3><strong>Shipping Details</strong></h3>
                            </div>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th scope="row">Shipping Name:</th>
                                        <td>{{$order->shpping_fname }} {{$order->shpping_lname}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shipping Email:</th>
                                        <td>{{$order->shpping_email}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shipping Number:</th>
                                        <td>{{$order->shpping_number}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shipping Address:</th>
                                        <td>{{$order->shpping_address}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shipping City:</th>
                                        <td>{{$order->shpping_city}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Shipping Country:</th>
                                        <td>{{$order->shpping_country}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div>
                                <h3><strong>Ordered Products</strong></h3>
                            </div>

                            <table class="table table-striped" style="margin-bottom:100px">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Product Title</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderitems as $key => $item)

                                    <tr>
                                        <th>{{$key+1}}</th>
                                        <td>
                                            <h4><strong>{{$item->title}}</strong></h4>
                                            @php
                                                $variations = json_decode($item->variations, true);
                                            @endphp
                                            @if (!empty($variations))
                                                <p><strong>Variation:</strong> {{$variations["name"]}}</p>
                                            @endif
                                            @php
                                                $addons = json_decode($item->addons, true);
                                            @endphp
                                            @if (!empty($addons))
                                                <p>
                                                    <strong>Add On's:</strong>

                                                    @foreach ($addons as $addon)
                                                        {{$addon["name"]}}
                                                        @if (!$loop->last)
                                                        ,
                                                        @endif
                                                    @endforeach
                                                </p>
                                            @endif
                                        </td>
                                        <td>
                                            <p>
                                                <strong>{{__("Product")}}:</strong>
                                                {{$order->currency_code_position == 'left' ? $order->currency_code : ''}}
                                                <span>{{(float)$item->product_price}}</span>
                                                {{$order->currency_code_position == 'right' ? $order->currency_code : ''}}
                                            </p>
                                            @if (is_array($variations))
                                            <p>
                                                <strong>{{__("Variation")}}: </strong>
                                                {{$order->currency_code_position == 'left' ? $order->currency_code : ''}}
                                                <span>{{(float)$item->variations_price}}</span>
                                                {{$order->currency_code_position == 'right' ? $order->currency_code : ''}}
                                            </p>
                                            @endif
                                            @if (is_array($addons))
                                                <p>
                                                    <strong>{{__("Add On's")}}: </strong>
                                                    {{$order->currency_code_position == 'left' ? $order->currency_code : ''}}
                                                    <span>{{(float)$item->addons_price}}</span>
                                                    {{$order->currency_code_position == 'right' ? $order->currency_code : ''}}
                                                </p>
                                            @endif
                                        </td>
                                        <td>{{$item->qty}}</td>
                                        <td><span>{{$order->currency_code_position == 'left' ? $order->currency_code : ''}}</span> {{$item->total}} <span>{{$order->currency_code_position == 'right' ? $order->currency_code : ''}}</span></td>

                                      </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>
</html>
