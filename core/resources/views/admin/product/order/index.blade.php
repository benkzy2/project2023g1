@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">
      @if (request()->path()=='admin/product/pending/orders')
        Pending
      @elseif (request()->path()=='admin/product/all/orders')
        All
      @elseif (request()->path()=='admin/product/processing/orders')
        Processing
      @elseif (request()->path()=='admin/product/completed/orders')
        Completed
      @elseif (request()->path()=='admin/product/rejected/orders')
        Rejcted
      @endif
      Orders
    </h4>
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
        <a href="#">Product Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
            @if (request()->path()=='admin/product/pending/orders')
            Pending
          @elseif (request()->path()=='admin/product/all/orders')
            All
          @elseif (request()->path()=='admin/product/processing/orders')
            Processing
          @elseif (request()->path()=='admin/product/completed/orders')
            Completed
          @elseif (request()->path()=='admin/product/rejected/orders')
            Rejcted
          @elseif (request()->path()=='admin/product/search/orders')
            Search
          @endif
          Orders
        </a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-title">
                        @if (request()->path()=='admin/product/pending/orders')
                            Pending
                        @elseif (request()->path()=='admin/product/all/orders')
                            All
                        @elseif (request()->path()=='admin/product/processing/orders')
                            Processing
                        @elseif (request()->path()=='admin/product/completed/orders')
                            Completed
                        @elseif (request()->path()=='admin/product/rejected/orders')
                            Rejcted
                         @elseif (request()->path()=='admin/product/search/orders')
                            Search
                        @endif
                        Orders
                    </div>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-danger float-right btn-md ml-4 d-none bulk-delete" data-href="{{route('admin.product.order.bulk.delete')}}"><i class="flaticon-interface-5"></i> Delete</button>
                    <form action="{{url()->current()}}" class="d-inline-block float-right">
                    <input class="form-control" type="text" name="search" placeholder="Search by Oder Number" value="{{request()->input('search') ? request()->input('search') : '' }}">
                  </form>
              </div>
            </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              @if (count($orders) == 0)
                <h3 class="text-center">NO ORDER FOUND</h3>
              @else
                <div class="table-responsive">
                  <table class="table table-striped mt-3">
                    <thead>
                      <tr>
                        <th scope="col">
                            <input type="checkbox" class="bulk-check" data-val="all">
                        </th>

                        <th scope="col">Order Number</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $key => $order)
                        <tr>
                          <td>
                            <input type="checkbox" class="bulk-check" data-val="{{$order->id}}">
                          </td>
                          <td>#{{$order->order_number}}</td>
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
                                bg-warning
                              @elseif ($order->order_status == 'processing')
                                bg-primary
                              @elseif ($order->order_status == 'completed')
                                bg-success
                              @elseif ($order->order_status == 'rejected')
                                bg-danger
                              @endif
                              " name="order_status" onchange="document.getElementById('statusForm{{$order->id}}').submit();">
                                <option value="pending" {{$order->order_status == 'pending' ? 'selected' : ''}}>Pending</option>
                                <option value="processing" {{$order->order_status == 'processing' ? 'selected' : ''}}>Processing</option>
                                <option value="completed" {{$order->order_status == 'completed' ? 'selected' : ''}}>Completed</option>
                                <option value="rejected" {{$order->order_status == 'rejected' ? 'selected' : ''}}>Rejected</option>
                              </select>
                            </form>
                          </td>
                          <td>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  Actions
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                  <a class="dropdown-item" href="{{route('admin.product.details',$order->id)}}">Details</a>
                                  <a class="dropdown-item" href="{{asset('assets/front/invoices/product/'.$order->invoice_number)}}">Invoice</a>
                                  <a class="dropdown-item" href="#">
                                    <form class="deleteform d-inline-block" action="{{route('admin.product.order.delete')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                        <button type="submit" class="deletebtn">
                                          Delete
                                        </button>
                                    </form>
                                  </a>
                                </div>
                            </div>

                          </td>
                        </tr>

                      @endforeach
                    </tbody>
                  </table>
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="row">
            <div class="d-inline-block mx-auto">
              {{$orders->appends(['search' => request()->input('search')])->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
