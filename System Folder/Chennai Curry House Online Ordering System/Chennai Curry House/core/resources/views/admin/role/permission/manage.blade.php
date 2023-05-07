@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Roles</h4>
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
        <a href="#">{{$role->name}}</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Permissions Management</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Permissions Management</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.role.index')}}">
            <span class="btn-label">
              <i class="fas fa-backward"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-8 offset-lg-2">
              <form id="permissionsForm" class="" action="{{route('admin.role.permissions.update')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" name="role_id" value="{{Request::route('id')}}">

                @php
                  $permissions = $role->permissions;
                  if (!empty($role->permissions)) {
                    $permissions = json_decode($permissions, true);
                  }
                @endphp

                <div class="form-group">
                  <label for="">Permissions: </label>
                	<div class="selectgroup selectgroup-pills mt-2">
                		<label class="selectgroup-item">
                			<input type="hidden" name="permissions[]" value="Dashboard" class="selectgroup-input">
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="POS" class="selectgroup-input" @if(is_array($permissions) && in_array('POS', $permissions)) checked @endif>
                			<span class="selectgroup-button">POS</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Order Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Order Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Order Management</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Customers" class="selectgroup-input" @if(is_array($permissions) && in_array('Customers', $permissions)) checked @endif>
                			<span class="selectgroup-button">Customers</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Product Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Product Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Items Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="QR Code Builder" class="selectgroup-input" @if(is_array($permissions) && in_array('QR Code Builder', $permissions)) checked @endif>
                			<span class="selectgroup-button">QR Code Builder</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Payment Gateways" class="selectgroup-input" @if(is_array($permissions) && in_array('Payment Gateways', $permissions)) checked @endif>
                			<span class="selectgroup-button">Payment Gateways</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Reservation Settings" class="selectgroup-input" @if(is_array($permissions) && in_array('Reservation Settings', $permissions)) checked @endif>
                			<span class="selectgroup-button">Reservation Settings</span>
						</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Table Reservation" class="selectgroup-input" @if(is_array($permissions) && in_array('Table Reservation', $permissions)) checked @endif>
                			<span class="selectgroup-button">Table Reservations</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Table Reservation" class="selectgroup-input" @if(is_array($permissions) && in_array('Table Reservation', $permissions)) checked @endif>
                			<span class="selectgroup-button">Tables & QR Builder</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Menu Builder" class="selectgroup-input" @if(is_array($permissions) && in_array('Menu Builder', $permissions)) checked @endif>
                			<span class="selectgroup-button">Drag & Draop Menu Builder</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Website Pages" class="selectgroup-input" @if(is_array($permissions) && in_array('Website Pages', $permissions)) checked @endif>
                			<span class="selectgroup-button">Website Pages</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Announcement Popup" class="selectgroup-input" @if(is_array($permissions) && in_array('Announcement Popup', $permissions)) checked @endif>
                			<span class="selectgroup-button">Announcement Popup</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Push Notification" class="selectgroup-input" @if(is_array($permissions) && in_array('Push Notification', $permissions)) checked @endif>
                			<span class="selectgroup-button">Push Notification</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Subscribers" class="selectgroup-input" @if(is_array($permissions) && in_array('Subscribers', $permissions)) checked @endif>
                			<span class="selectgroup-button">Subscribers</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Basic Settings" class="selectgroup-input" @if(is_array($permissions) && in_array('Basic Settings', $permissions)) checked @endif>
                			<span class="selectgroup-button">Settings</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Language Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Language Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Language Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Admins Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Admins Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Admins Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Sitemap" class="selectgroup-input" @if(is_array($permissions) && in_array('Sitemap', $permissions)) checked @endif>
                			<span class="selectgroup-button">Sitemap</span>
                        </label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Backup" class="selectgroup-input" @if(is_array($permissions) && in_array('Backup', $permissions)) checked @endif>
                			<span class="selectgroup-button">Database Backup</span>
                		</label>
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
                <button type="submit" id="permissionBtn" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
