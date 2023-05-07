@extends('front.layout')

@section('content')
@section('content')
<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('My Order')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{('My Order')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>


<!--====== CHECKOUT PART START ======-->
<section class="user-dashbord content mt-5">
    <div class="container">
        <div class="row">
            @include('user.inc.site_bar')
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="user-profile-details">
                            <div class="account-info">
                                <div class="title">
                                    <h4>{{__('All Orders')}}</h4>
                                </div>
                                <div class="main-info">
                                    <div class="main-table">
                                    <div class="table-responsive">
                                        <table id="example" class="dataTables_wrapper dt-responsive table-striped dt-bootstrap4 w-100">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Order Number')}}</th>
                                                    <th>{{__('Type')}}</th>
                                                    <th>{{__('Serving Method')}}</th>
                                                    <th>{{__('Date')}}</th>
                                                    <th>{{__('Total Price')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($orders)
                                                @foreach ($orders as $order)
                                                <tr>
                                                    <td>{{$order->order_number}}</td>
                                                    <td>
                                                        @if ($order->type == 'website')
                                                            Website
                                                        @elseif ($order->type == 'qr')
                                                            QR
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($order->serving_method == 'on_table')
                                                            On Table
                                                        @elseif ($order->serving_method == 'home_delivery')
                                                            Home Delivery
                                                        @elseif ($order->serving_method == 'pick_up')
                                                            Pick up
                                                        @endif
                                                    </td>
                                                     <td>{{$order->created_at->format('d-m-Y')}}</td>
                                                     <td>{{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} {{$order->total}} {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}</td>
                                                    <td><a href="{{route('user-orders-details',$order->id)}}" class="btn">{{__('Details')}}</a></td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr class="text-center">
                                                    <td colspan="4">
                                                        {{__('No Orders')}}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <div>
                                        {{$orders->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--    footer section start   -->
@endsection
