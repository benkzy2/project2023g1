@extends('admin.layout')

@section('styles')
    <style>
        @media only screen and (max-width: 1500px) {
            .card-title {
                font-size: 15px;
            }
        }
    </style>
@endsection

@section('content')
<div class="page-header">
   <h4 class="page-title">{{__('Order Details')}}</h4>
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
         <a href="{{url()->previous()}}">{{__('Order Management')}}</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="{{url()->previous()}}">{{__('Orders')}}</a>
      </li>
      <li class="separator">
         <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
         <a href="#">{{__('Details')}}</a>
      </li>
   </ul>
</div>
<div class="row">
    <div class="col-md-4">
       <div class="card">
          <div class="card-header">
             <div class="card-title d-flex justify-content-between">
                 <span>{{__('Order')}}  [ {{ $order->order_number}} ]</span>
                 @if (!empty($order->token_no))
                 <span>Token No. {{$order->token_no}}</span>
                 @endif
             </div>

          </div>
          <div class="card-body pt-5 pb-5">
             <div class="payment-information">

                @if (!empty($order->type))
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Ordered From')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                        @if(strtolower($order->type) =='website')
                            Website Menu
                        @elseif(strtolower($order->type) =='qr')
                            QR Menu
                        @elseif(strtolower($order->type) =='pos')
                            POS
                        @endif
                    </div>
                </div>
                @endif

                @if (!empty($order->serving_method))
                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Serving Method')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                        @if(strtolower($order->serving_method) == 'on_table')
                            {{__('On Table')}}
                        @elseif(strtolower($order->serving_method) == 'home_delivery')
                            {{__('Home Delivery')}}
                        @elseif(strtolower($order->serving_method) == 'pick_up')
                            {{__('Pick up')}}
                        @endif
                    </div>
                </div>
                @endif


                @if ($order->postal_code_status == 0)

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Shipping Method')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                       @if (!empty($order->shipping_method))
                       {{$order->shipping_method}}
                       @else
                       -
                       @endif
                    </div>
                </div>
                @elseif ($order->postal_code_status == 1)

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Postal Code')}} (Delivery Area) :</strong>
                    </div>
                    <div class="col-lg-6">
                       @if (!empty($order->postal_code))
                       {{$order->postal_code}}
                       @else
                       -
                       @endif
                    </div>
                </div>
                @endif

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Discount')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                        {{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} {{$order->coupon}} {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Tax')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                        {{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} {{$order->tax}} {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Shipping Charge')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                        @if (!empty($order->shipping_charge))
                            {{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} {{$order->shipping_charge}} {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}
                        @else
                            {{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} 0 {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}
                        @endif

                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Total')}} :</strong>
                    </div>
                    <div class="col-lg-6">
                       {{$order->currency_symbol_position == 'left' ? $order->currency_symbol : ''}} {{$order->total}} {{$order->currency_symbol_position == 'right' ? $order->currency_symbol : ''}}
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-lg-6">
                        <strong>{{__('Payment Gateway')}} :</strong>
                    </div>
                    <div class="col-lg-6 text-capitalize">
                        {{convertUtf8($order->method)}}
                    </div>
                </div>

                @if (!empty($order->receipt))
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <strong>{{__('Receipt')}} :</strong>
                        </div>
                        <div class="col-lg-6 text-capitalize">
                            <a href="#" data-toggle="modal" data-target="#receiptModal">Show</a>
                        </div>
                    </div>
                @endif

                 <div class="row mb-2">
                     <div class="col-lg-6">
                         <strong>{{__('Payment Status')}} :</strong>
                     </div>
                     <div class="col-lg-6">
                         @if($order->payment_status =='Pending' || $order->payment_status == 'pending')
                         <span class="badge badge-danger">{{convertUtf8($order->payment_status)}}  </span>
                         @else
                         <span class="badge badge-success">{{convertUtf8($order->payment_status)}}  </span>
                         @endif
                     </div>
                 </div>

                 <div class="row mb-2">
                     <div class="col-lg-6">
                         <strong>{{__('Order Status')}} :</strong>
                     </div>
                     <div class="col-lg-6">
                         @php
                             if($order->order_status == 'pending') {
                                 $badge = 'default';
                             } elseif($order->order_status == 'received') {
                                 $badge = 'secondary';
                             } elseif($order->order_status == 'preparing') {
                                 $badge = 'warning';
                             } elseif($order->order_status == 'ready_to_pick_up') {
                                 $badge = 'primary';
                             } elseif($order->order_status == 'picked_up') {
                                 $badge = 'info';
                             } elseif($order->order_status == 'delivered') {
                                 $badge = 'success';
                             } elseif($order->order_status == 'cancelled') {
                                 $badge = 'danger';
                             } elseif($order->order_status == 'ready_to_serve') {
                                 $badge = 'white';
                             } elseif($order->order_status == 'served') {
                                 $badge = 'light';
                             }
                         @endphp

                        <span class="badge badge-{{$badge}} text-capitalize">{{convertUtf8(str_replace("_", " ", $order->order_status))}}</span>
                     </div>
                 </div>

                 <div class="row mb-2">
                     <div class="col-lg-6">
                         <strong>{{__('Complete')}} :</strong>
                     </div>
                     <div class="col-lg-6">
                         @if(strtolower($order->completed) =='yes')
                         <span class="badge badge-success">{{__('Yes')}}  </span>
                         @else
                         <span class="badge badge-danger">{{__('No')}}  </span>
                         @endif
                     </div>
                 </div>

                 @if ($order->serving_method == 'home_delivery')
                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <strong>{{__('Preferred Delivery Date')}} :</strong>
                        </div>
                        <div class="col-lg-6">
                            {{$order->delivery_date ? $order->delivery_date : '-'}}
                        </div>
                    </div>


                    <div class="row mb-2">
                        <div class="col-lg-6">
                            <strong>{{__('Preferred Delivery Time Frame')}} :</strong>
                        </div>
                        <div class="col-lg-6">
                            {{$order->delivery_time_start}} - {{$order->delivery_time_end}}
                        </div>
                    </div>
                 @endif


                 <div class="row mb-2">
                     <div class="col-lg-6">
                         <strong>{{__('Time')}} :</strong>
                     </div>
                     <div class="col-lg-6">
                        {{$order->created_at}}
                     </div>
                 </div>


                 <div class="row mb-0">
                     <div class="col-lg-6">
                         <strong>{{__('Order Notes')}} :</strong>
                     </div>
                     <div class="col-lg-6">
                         @if (!empty($order->order_notes))
                             <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalNotes">Show</button>
                         @else
                            -
                         @endif
                     </div>
                 </div>

                <!-- Modal -->
                <div class="modal fade" id="modalNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Order Notes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{$order->order_notes}}
                        </div>
                    </div>
                    </div>
                </div>

             </div>
          </div>
       </div>

    </div>

    @if ($order->serving_method == 'home_delivery' && $order->type != 'pos')
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="card-title d-inline-block">Shipping Details</div>

                </div>
                <div class="card-body pt-5 pb-5">
                    <div class="payment-information">
                        @if (!empty($order->shpping_fname))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Name')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                {{convertUtf8($order->shpping_fname)}}
                                </div>
                            </div>
                        @endif
                        @if (!empty($order->shpping_email))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Email')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                {{convertUtf8($order->shpping_email)}}
                                </div>
                            </div>
                        @endif
                        @if (!empty($order->shpping_number))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Phone')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                    {{$order->shpping_country_code}}{{$order->shpping_number}}
                                </div>
                            </div>
                        @endif
                        @if (!empty($order->shpping_city))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('City')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                {{convertUtf8($order->shpping_city)}}
                                </div>
                            </div>
                        @endif
                        @if (!empty($order->shpping_address))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Address')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                {{convertUtf8($order->shpping_address)}}
                                </div>
                            </div>
                        @endif
                        @if (!empty($order->shpping_country))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Country')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                    {{convertUtf8($order->shpping_country)}}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>

    @endif

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <div class="card-title d-inline-block">
                    @if ($order->serving_method == 'home_delivery')
                        Billing Details
                    @else
                        Information
                    @endif
                </div>
            </div>
            <div class="card-body pt-5 pb-5">
                <div class="payment-information">
                    @if (!empty($order->billing_fname))
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Name')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                            {{convertUtf8($order->billing_fname)}}
                            </div>
                        </div>
                    @endif
                    @if (!empty($order->billing_email))
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Email')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                            {{convertUtf8($order->billing_email)}}
                            </div>
                        </div>
                    @endif
                    @if (!empty($order->billing_number))
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Phone')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                                {{$order->billing_country_code}}{{$order->billing_number}}
                            </div>
                        </div>
                    @endif
                    @if (!empty($order->billing_city))
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('City')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                            {{convertUtf8($order->billing_city)}}
                            </div>
                        </div>
                    @endif
                    @if (!empty($order->billing_address))
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Address')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                            {{convertUtf8($order->billing_address)}}
                            </div>
                        </div>
                    @endif
                    @if (!empty($order->billing_country))
                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Country')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                                {{convertUtf8($order->billing_country)}}
                            </div>
                        </div>
                    @endif

                    @if ($order->serving_method == 'on_table')
                        @if (!empty($order->table_number))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Table Number')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                    {{convertUtf8($order->table_number)}}
                                </div>
                            </div>
                        @endif

                        <div class="row mb-2">
                            <div class="col-lg-6">
                                <strong>{{__('Waiter Name')}} :</strong>
                            </div>
                            <div class="col-lg-6">
                                @if (!empty($order->waiter_name))
                                    {{convertUtf8($order->waiter_name)}}
                                @else
                                    -
                                @endif
                            </div>
                        </div>
                    @endif

                    @if ($order->serving_method == 'pick_up')
                        @if (!empty($order->pick_up_date))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Pick up Date')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                    {{date("jS F, Y", strtotime($order->pick_up_date))}}
                                </div>
                            </div>
                        @endif
                        @if (!empty($order->pick_up_time))
                            <div class="row mb-2">
                                <div class="col-lg-6">
                                    <strong>{{__('Pick up Time')}} :</strong>
                                </div>
                                <div class="col-lg-6">
                                    {{convertUtf8($order->pick_up_time)}}
                                </div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

    </div>

   <div class="col-lg-12">
    <div class="card">
       <div class="card-header">
          <h4 class="card-title">{{__('Ordered Products')}}</h4>
       </div>
       <div class="card-body">
          <div class="table-responsive product-list">
             <table class="table table-bordered">
                <thead>
                   <tr>
                      <th>#</th>
                      <th>{{__('Product')}}</th>
                      <th>{{__('Product Title')}}</th>
                      <th>{{__('Price')}}</th>
                      <th>{{__('Quantity')}}</th>
                      <th>{{__('Total')}}</th>
                   </tr>
                </thead>
                <tbody>
                   @foreach ($order->orderitems as $key => $item)
                   <tr>
                      <td>{{$key+1}}</td>
                      <td><img src="{{asset('assets/front/img/product/featured/'.$item->image)}}" alt="product" width="100"></td>
                      <td>
                          <strong class="mr-3">{{$item->title}}</strong>
                          <br>
                          @php
                            $variations = json_decode($item->variations, true);
                          @endphp
                          @if (!empty($variations))
                            <strong class="mr-3">{{__("Variation")}}:</strong> 
                            @foreach ($variations as $vKey => $variation)
                                <span class="text-capitalize">{{str_replace("_"," ",$vKey)}}:</span> {{$variation["name"]}}
                                @if (!$loop->last)
                                ,
                                @endif
                            @endforeach    
                            <br>
                          @endif
                          @php
                              $addons = json_decode($item->addons, true);
                          @endphp
                          @if (!empty($addons))
                            <strong class="mr-3">Add On's:</strong>

                            @foreach ($addons as $addon)
                                {{$addon["name"]}}
                                @if (!$loop->last)
                                ,
                                @endif
                            @endforeach
                          @endif
                      </td>
                      <td>
                        <strong class="mr-2">{{__("Product")}}:</strong>
                        {{$order->currency_code_position == 'left' ? $order->currency_code : ''}}
                        <span>{{(float)$item->product_price}}</span>
                        {{$order->currency_code_position == 'right' ? $order->currency_code : ''}}
                        <br>
                        @if (is_array($variations))
                            <strong class="mr-2">{{__("Variation")}}: </strong>
                            {{$order->currency_code_position == 'left' ? $order->currency_code : ''}}
                            <span>{{(float)$item->variations_price}}</span>
                            {{$order->currency_code_position == 'right' ? $order->currency_code : ''}}
                            <br>
                        @endif
                        @if (is_array($addons))
                            <strong class="mr-2">{{__("Add On's")}}: </strong>
                            {{$order->currency_code_position == 'left' ? $order->currency_code : ''}}
                            <span>{{(float)$item->addons_price}}</span>
                            {{$order->currency_code_position == 'right' ? $order->currency_code : ''}}
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

{{-- Receipt Modal --}}
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Receipt Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <img src="{{asset('assets/front/receipt/' . $order->receipt)}}" alt="Receipt" width="100%">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>
@endsection
