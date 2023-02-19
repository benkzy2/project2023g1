@extends('front.layout')

@section('content')
@section('content')
<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('Order Details')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{('Order Details')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

    <!--====== CHECKOUT PART START ======-->
    <section class="user-dashbord">
        <div class="container">
            <div class="row">
                @include('user.inc.site_bar')
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="user-profile-details">
                                <div class="order-details">
                                    <div class="progress-area-step">
                                        <ul class="progress-steps">
                                            <li class="{{$data->order_status == 'pending' ? 'active' : ''}}">
                                                <div class="icon"></div>
                                                <div class="progress-title">{{__('Pending')}}</div>
                                            </li>
                                            <li class="{{$data->order_status == 'processing' ? 'active' : ''}}">
                                                <div class="icon"></div>
                                                <div class="progress-title">{{__('Processing')}}</div>
                                            </li>
                                            <li class="{{$data->order_status == 'completed' ? 'active' : ''}}">
                                                <div class="icon"></div>
                                                <div class="progress-title">{{__('Completed')}}</div>
                                            </li>
                                            <li class="{{$data->order_status == 'reject' ? 'active' : ''}}">
                                                <div class="icon"></div>
                                                <div class="progress-title">{{__('Rejected')}}</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="title">
                                        <h4>{{__('My Order Details')}}</h4>
                                    </div>
                                    <div id="print">
                                    <div class="view-order-page">
                                        <div class="order-info-area">
                                            <div class="row align-items-center">
                                                <div class="col-lg-8">
                                                   <div class="order-info">
                                                       <h3>{{__('Order')}} {{$data->order_id}} [{{$data->order_status}}]</h3>
                                                   <p>{{__('Order Date')}} {{$data->created_at->format('d-m-Y')}}</p>
                                                   </div>
                                                </div>
                                                <div class="col-lg-4 print-btn">
                                                    <div class="prinit">
                                                        <a href="{{asset('assets/front/invoices/product/' . $data->invoice_number)}}" download="invoice" id="print-click" class="btn"><i class="fas fa-print"></i>{{__('Download Invoice')}}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="billing-add-area">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="main-info">
                                                    <h5>{{__('Shipping Details')}}</h5>
                                                    <ul class="list">
                                                        <li><p><span>{{__('Email')}}:</span>{{convertUtf8($data->shpping_email)}}</p></li>
                                                        <li><p><span>{{__('Phone')}}:</span>{{convertUtf8($data->shpping_number)}}</p></li>
                                                        <li><p><span>{{__('City')}}:</span>{{convertUtf8($data->shpping_city)}}</p></li>
                                                        <li><p><span>{{__('Address')}}:</span>{{convertUtf8($data->shpping_address)}}</p></li>
                                                        <li><p><span>{{__('Country')}}:</span>{{convertUtf8($data->shpping_country)}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="main-info">
                                                    <h5>{{__('Billing Details')}}</h5>
                                                    <ul class="list">
                                                        <li><p><span>{{__('Email')}}:</span>{{convertUtf8($data->billing_email)}}</p></li>
                                                        <li><p><span>{{__('Phone')}}:</span>{{convertUtf8($data->billing_number)}}</p></li>
                                                        <li><p><span>{{__('City')}}:</span>{{convertUtf8($data->billing_city)}}</p></li>
                                                        <li><p><span>{{__('Address')}}:</span>{{convertUtf8($data->billing_address)}}</p></li>
                                                        <li><p><span>{{__('Country')}}:</span>{{convertUtf8($data->billing_country)}}</p></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-4 ">
                                                <div class="payment-information">
                                                    <h5>{{__('Payment Status')}} : </h5>
                                                    <p>{{__('Payment Status')}} :
                                                        @if($data->payment_status =='Pending' || $data->payment_status == 'pending')
                                                        <span class="badge badge-danger">{{$data->payment_status}}  </span>
                                                        @else
                                                        <span class="badge badge-success">{{$data->payment_status}}  </span>
                                                        @endif
                                                    </p>
                                                    @if (!empty($data->shipping_method))
                                                    <p>{{__('Shipping Method')}} : <span> {{$data->shipping_method}} </span></p>
                                                    @endif
                                                    <p>{{__('Shipping Charge')}} : <span class="amount">{{$data->currency_symbol_position == 'left' ? $data->currency_symbol : ''}} {{$data->shipping_charge}} {{$data->currency_symbol_position == 'right' ? $data->currency_symbol : ''}}</span></p>
                                                    <p>{{__('Paid amount')}} : <span class="amount">{{$data->currency_symbol_position == 'left' ? $data->currency_symbol : ''}} {{$data->total}} {{$data->currency_symbol_position == 'right' ? $data->currency_symbol : ''}}</span></p>
                                                <p>{{__('Payment Method')}} : {{convertUtf8($data->method)}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive product-list">
                                        <h5>{{__('Order Product')}}</h5>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{__('Image')}}</th>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Details')}}</th>
                                                    <th>{{__('Price')}}</th>
                                                    <th>{{__('Total')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->orderitems as $key => $order)
                                                @php
                                                    $product = App\Models\Product::findOrFail($order->product_id);
                                                @endphp
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><img src="{{asset('assets/front/img/product/featured/'.$order->image)}}" alt="product" width="100"></td>
                                                    <td><a href="{{route('front.product.details',[$product->slug,$product->id])}}">{{convertUtf8($order->title)}}</a></td>
                                                    <td>
                                                        <b>{{__('Quantity')}}:</b> <span>{{$order->qty}}</span><br>
                                                    </td>
                                                    <td>{{$data->currency_symbol_position == 'left' ? $data->currency_symbol : ''}}{{convertUtf8($order->price)}}{{$data->currency_symbol_position == 'right' ? $data->currency_symbol : ''}}</td>
                                                    <td>{{$data->currency_symbol_position == 'left' ? $data->currency_symbol : ''}}{{convertUtf8($order->price * $order->qty)}}{{$data->currency_symbol_position == 'right' ? $data->currency_symbol : ''}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                    <div class="edit-account-info">
                                        <a href="{{ URL::previous() }}" class="btn btn-primary">{{__('back')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

