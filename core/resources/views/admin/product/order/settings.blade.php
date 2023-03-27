@extends('admin.layout')

@section('content')
<div class="page-header">
    <h4 class="page-title">Settings</h4>
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
            <a href="#">Settings</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-title">Settings</div>
                    </div>
                </div>
            </div>
            <div class="card-body pt-5 pb-5">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <form action="{{route('admin.reset.token')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Token No. Restarts From **</label>
                                <div class="row">
                                    <div class="col-9">
                                        <input type="number" class="form-control" name="token_no" placeholder="Enter Toke no from it will start" value="{{$bs->token_no_start}}" required>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-success">Reset</button>
                                    </div>
                                </div>
                                <p class="text-warning mb-0">
                                    With each order from Table Token No. will be increased by one.
                                    <br>
                                    You can change the starting point anytime.
                                </p>
                            </div>
                        </form>

                        <form id="settingsForm" action="{{route('admin.order.update.settings')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Postal Code Based Delivery **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="postal_code" value="1" class="selectgroup-input" {{$bs->postal_code == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Enable</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="postal_code" value="0" class="selectgroup-input" {{$bs->postal_code == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Disable</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0">If you disable it, then you will be able to set shipping / delivery charges without postal code.</p>
                                        @if ($errors->has('postal_code'))
                                        <p class="mb-0 text-danger">{{$errors->first('postal_code')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Delivery Date & Time Field **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="delivery_date_time_status" value="1" class="selectgroup-input" {{$be->delivery_date_time_status == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Enable</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="delivery_date_time_status" value="0" class="selectgroup-input" {{$be->delivery_date_time_status == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Disable</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0">This will decide whether delivery date / time fields will be shown in checkout page</p>
                                        @if ($errors->has('delivery_date_time_status'))
                                        <p class="mb-0 text-danger">{{$errors->first('delivery_date_time_status')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Delivery Date / Time Field Validation **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="delivery_date_time_required" value="1" class="selectgroup-input" {{$be->delivery_date_time_required == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Required</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="delivery_date_time_required" value="0" class="selectgroup-input" {{$be->delivery_date_time_required == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Optional</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0">This will decide whether delivery date / time fields are required or optional</p>
                                        @if ($errors->has('delivery_date_time_required'))
                                        <p class="mb-0 text-danger">{{$errors->first('delivery_date_time_required')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Whatsapp Order Notification (Home Delivery) **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_home_delivery" value="1" class="selectgroup-input" {{$abex->whatsapp_home_delivery == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Enable</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_home_delivery" value="0" class="selectgroup-input" {{$abex->whatsapp_home_delivery == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Disable</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0 d-inline-block">If you want to enable any whatsapp notification, then you have to setup twilio credentials from </p> <a class="text-primary" target="_blank" href="{{route('admin.script')}}">Here</a> 
                                        @if ($errors->has('whatsapp_home_delivery'))
                                        <p class="mb-0 text-danger">{{$errors->first('whatsapp_home_delivery')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Whatsapp Order Notification (Pickup) **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_pickup" value="1" class="selectgroup-input" {{$abex->whatsapp_pickup == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Enable</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_pickup" value="0" class="selectgroup-input" {{$abex->whatsapp_pickup == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Disable</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0 d-inline-block">If you want to enable any whatsapp notification, then you have to setup twilio credentials from </p> <a class="text-primary" target="_blank" href="{{route('admin.script')}}">Here</a> 
                                        @if ($errors->has('whatsapp_pickup'))
                                        <p class="mb-0 text-danger">{{$errors->first('whatsapp_pickup')}}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Whatsapp Order Notification (On Table) **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_on_table" value="1" class="selectgroup-input" {{$abex->whatsapp_on_table == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Enable</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_on_table" value="0" class="selectgroup-input" {{$abex->whatsapp_on_table == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Disable</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0 d-inline-block">If you want to enable any whatsapp notification, then you have to setup twilio credentials from </p> <a class="text-primary" target="_blank" href="{{route('admin.script')}}">Here</a> 
                                        @if ($errors->has('whatsapp_on_table'))
                                        <p class="mb-0 text-danger">{{$errors->first('whatsapp_on_table')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Whatsapp Notification on Order Status Change **</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_order_status_notification" value="1" class="selectgroup-input" {{$abex->whatsapp_order_status_notification == 1 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Enable</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="whatsapp_order_status_notification" value="0" class="selectgroup-input" {{$abex->whatsapp_order_status_notification == 0 ? 'checked' : ''}}>
                                                <span class="selectgroup-button">Disable</span>
                                            </label>
                                        </div>
                                        <p class="text-warning mb-0 d-inline-block">If you want to enable any whatsapp notification, then you have to setup twilio credentials from </p> <a class="text-primary" target="_blank" href="{{route('admin.script')}}">Here</a> 
                                        <p class="text-warning mb-0">if this is enabled, then customers will be notified via Whatsapp once order status is changed</p>
                                        @if ($errors->has('whatsapp_order_status_notification'))
                                        <p class="mb-0 text-danger">{{$errors->first('whatsapp_order_status_notification')}}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form">
                    <div class="form-group from-show-notify row">
                        <div class="col-12 text-center">
                            <button form="settingsForm" type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
