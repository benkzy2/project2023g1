@extends('front.layout')

@section('content')

<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('Dashboard')}}</h2>
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
                <div class="row mb-5">
                    <div class="col-lg-12">
                        <div class="user-profile-details">
                            <div class="account-info">
                                <div class="title">
                                    <h4>{{__('Account Information')}}</h4>
                                </div>
                                <div class="main-info">
                                    <h5>{{__('User')}}</h5>
                                    <ul class="list">
                                        <li><span>{{__('Username')}}:</span></li>
                                        <li><span>{{__('Email Address')}}:</span></li>
                                        <li><span>{{__('Phone')}}:</span></li>
                                        <li><span>{{__('City')}}:</span></li>
                                        <li><span>{{__('State')}}:</span></li>
                                        <li><span>{{__('Address')}}:</span></li>
                                        <li><span>{{__('Country')}}:</span></li>
                                    </ul>
                                    <ul class="list">
                                        <li>{{convertUtf8($user->username)}}</li>
                                        <li>{{convertUtf8($user->email)}}</li>
                                        <li>{{convertUtf8($user->number)}}</li>
                                        <li>{{convertUtf8($user->fax)}}</li>
                                        <li>{{convertUtf8($user->city)}}</li>
                                        <li>{{convertUtf8($user->state)}}</li>
                                        <li>{{convertUtf8($user->address)}}</li>
                                        <li>{{convertUtf8($user->country)}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-info">
                            <div class="title">
                                <h4>{{__('Recent Orders')}}</h4>
                            </div>
                            <div class="main-info">
                                <div class="main-table">
                                    <div class="table-responsiv">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
