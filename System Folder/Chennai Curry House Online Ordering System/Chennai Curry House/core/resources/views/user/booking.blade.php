@extends('front.layout')

@section('content')
@section('content')
<section class="page-title-area d-flex align-items-center" style="background-image: url('{{asset('assets/front/img/' . $bs->breadcrumb)}}');background-size:cover;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-title-item text-center">
                    <h2 class="title">{{__('My Booking')}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">{{('My Booking')}}</li>
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
                                    <h4>{{__('All Booking')}}</h4>
                                </div>
                                <div class="main-info">
                                    <div class="main-table">
                                    <div class="table-responsive">
                                        <table id="example" class="dataTables_wrapper dt-responsive table-striped dt-bootstrap4 w-100">
                                            <thead>
                                                <tr>
                                                    <th>{{__('Booking Number')}}</th>
                                                    <th>{{__('Name')}}</th>
                                                    <th>{{__('Email')}}</th>
                                                    <th>{{__('Phone')}}</th>
                                                    <th>{{__('Date')}}</th>
													<th>{{__('Time')}}</th>
													<th>{{__('Person')}}</th>
                                                    <th>{{__('Action')}}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($booking)
                                                @foreach ($booking as $booking)
                                                <tr>
                                                    <td>{{$booking->booking_number}}</td>
                                                    <td>
                                                        @if ($booking->type == 'website')
                                                            Website
                                                        @elseif ($booking->type == 'qr')
                                                            QR
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($booking->serving_method == 'on_table')
                                                            On Table
                                                        @elseif ($booking->serving_method == 'home_delivery')
                                                            Home Delivery
                                                        @elseif ($booking->serving_method == 'pick_up')
                                                            Pick up
                                                        @endif
                                                    </td>
                                                     <td>{{$booking->created_at->format('d-m-Y')}}</td>
                                                     <td>{{$booking->currency_symbol_position == 'left' ? $booking->currency_symbol : ''}} {{$booking->total}} {{$booking->currency_symbol_position == 'right' ? $booking->currency_symbol : ''}}</td>
                                                    <td><a href="{{route('user-booking-details',$booking->id)}}" class="btn">{{__('Details')}}</a></td>
                                                </tr>
                                                @endforeach
                                                @else
                                                <tr class="text-center">
                                                    <td colspan="4">
                                                        {{__('No Booking')}}
                                                    </td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                    <div>
                                        {{$booking->links()}}
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
