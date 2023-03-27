@extends('admin.layout')
@section('content')
<div class="page-header">
   <h4 class="page-title">Customer Details</h4>
   <ul class="breadcrumbs">
      <li class="nav-home">
         <a href="{{route('admin.dashboard')}}">
         <i class="flaticon-home"></i>
         </a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="{{url()->previous()}}">Customers</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">Customer Details</a>
      </li>
   </ul>

   <a href="{{ url()->previous() }}" class="btn-md btn btn-primary ml-auto">Back</a>
</div>
<div class="row">
   <div class="col-md-12">
            <div class="row">
               <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Customer Details')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('First Name:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->fname}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Last Name:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->lname}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Username:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->username}}
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Email:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->email}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Number:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->number}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Country:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->country}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('City:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->city}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Address:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->address}}
                            </div>
                        </div>

                    </div>
                </div>

               </div>



               <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Shipping Details')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Email:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_email}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Phone:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_number}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('City:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_city}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Address:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_address}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Country:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_country}}
                            </div>
                        </div>

                    </div>
                </div>

               </div>



               <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Billing Details')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Email:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_email}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Phone:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_number}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('City:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_city}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Address:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_address}}
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Country:')}}</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$user->billing_country}}
                            </div>
                        </div>

                    </div>
                </div>

               </div>
            </div>


      <div class="card">
        <div class="card-header">
            <h4 class="card-title">Orders of [{{ $user->username}}]</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive product-list">
                <h5></h5>
                <table class="table table-striped mt-3">
                   <thead>
                      <tr>
                         <th scope="col">Date</th>
                         <th scope="col">Total</th>
                         <th scope="col">Payment Status</th>
                         <th scope="col">Order Status</th>
                         <th scope="col">Details</th>
                      </tr>
                   </thead>
                   <tbody>
                      @foreach ($orders as $key => $order)
                      <tr>
                         <td>{{convertUtf8($order->created_at->format('d-m-Y'))}}</td>
                         <td>{{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} {{round($order->total,2)}} {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}</td>
                         <td>
                            @if ($order->payment_status == 'Pending' || $order->payment_status == 'pending')
                            <p class="badge badge-danger">{{$order->payment_status}}</p>
                            @else
                            <p class="badge badge-success">{{$order->payment_status}}</p>
                            @endif
                         </td>
                         <td>
                            <form id="statusForm{{$order->id}}" class="d-inline-block" action="{{route('admin.product.orders.status')}}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{$order->id}}">
                                <select class="form-control
                                @if ($order->order_status == 'pending')

                                @elseif ($order->order_status == 'received')
                                  bg-secondary
                                @elseif ($order->order_status == 'preparing')
                                  bg-warning
                                @elseif ($order->order_status == 'ready_to_pick_up')
                                  bg-primary
                                @elseif ($order->order_status == 'picked_up')
                                  bg-info
                                @elseif ($order->order_status == 'delivered')
                                  bg-success
                                @elseif ($order->order_status == 'cancelled')
                                  bg-danger
                                @elseif ($order->order_status == 'ready_to_serve')
                                  bg-white text-dark
                                @elseif ($order->order_status == 'served')
                                  bg-light text-dark
                                @endif
                                " name="order_status" onchange="document.getElementById('statusForm{{$order->id}}').submit();">
                                  <option value="pending" {{$order->order_status == 'pending' ? 'selected' : ''}}>Pending</option>
                                  <option value="received" {{$order->order_status == 'received' ? 'selected' : ''}}>Received</option>
                                  <option value="preparing" {{$order->order_status == 'preparing' ? 'selected' : ''}}>Preparing</option>

                                  @if ($order->serving_method != 'on_table')
                                  <option value="ready_to_pick_up" {{$order->order_status == 'ready_to_pick_up' ? 'selected' : ''}}>Ready to pick up</option>
                                  <option value="picked_up" {{$order->order_status == 'picked_up' ? 'selected' : ''}}>Picked up</option>
                                  @endif

                                  @if ($order->serving_method == 'home_delivery')
                                  <option value="delivered" {{$order->order_status == 'delivered' ? 'selected' : ''}}>Delivered</option>
                                  @endif

                                  @if ($order->serving_method == 'on_table')
                                  <option value="ready_to_serve" {{$order->order_status == 'ready_to_serve' ? 'selected' : ''}}>Ready to Serve</option>
                                  <option value="served" {{$order->order_status == 'served' ? 'selected' : ''}}>Served</option>
                                  @endif

                                  <option value="cancelled" {{$order->order_status == 'cancelled' ? 'selected' : ''}}>Cancelled</option>
                                </select>
                              </form>
                         </td>
                         <td>
                            <a href="{{route('admin.product.details',$order->id)}}" class="btn btn-primary btn-sm editbtn"><i class="fas fa-eye"></i> View</a>
                         </td>
                      </tr>
                      @endforeach
                   </tbody>
                </table>
             </div>

             <div class="text-center d-block">
                 {{$orders->links()}}
             </div>
        </div>
    </div>
   </div>
</div>
@endsection
