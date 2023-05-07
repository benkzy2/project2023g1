
@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">
      Delivery Time
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
        <a href="#">Order Management</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
            Delivery Time
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">
            Time Frames
        </a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
            <h3 class="text-capitalize float-left">Time Frames ({{request()->input('day')}})</h3>
            <a href="{{route('admin.deliverytime')}}" class="btn btn-info btn-sm float-right">Back</a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
                @if (count($timeframes) == 0)
                    <h3 class="text-center">NO TIMEFRAME AVAILABLE</h3>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Start Time</th>
                                    <th scope="col">End Time</th>
                                    <th scope="col">Max Orders</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($timeframes as $tf)
                                <tr>
                                    <td>{{$tf->start}}</td>
                                    <td>{{$tf->end}}</td>
                                    <td>{{$tf->max_orders}}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm editbtn" data-toggle="modal" data-target="#editModal" data-start="{{$tf->start}}" data-end="{{$tf->end}}" data-max_orders="{{$tf->max_orders}}" data-id="{{$tf->id}}">Edit</button>
                                        <form class="deleteform d-inline-block" action="{{route('admin.timeframe.delete')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="timeframe_id" value="{{$tf->id}}">
                                        <button type="submit" class="btn btn-danger btn-sm deletebtn">
                                            <span class="btn-label">
                                            <i class="fas fa-trash"></i>
                                            </span>
                                            Delete
                                        </button>
                                        </form>
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

      </div>
    </div>
  </div>

  @includeIf('admin.product.order.delivery_time.edit-timeframe')
@endsection
