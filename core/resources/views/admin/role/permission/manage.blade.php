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
            <div class="col-lg-6 offset-lg-3">
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
                			<input type="checkbox" name="permissions[]" value="Basic Settings" class="selectgroup-input" @if(is_array($permissions) && in_array('Basic Settings', $permissions)) checked @endif>
                			<span class="selectgroup-button">Basic Settings</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Subscribers" class="selectgroup-input" @if(is_array($permissions) && in_array('Subscribers', $permissions)) checked @endif>
                			<span class="selectgroup-button">Subscribers</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Product Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Product Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Product Management</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Payment Gateways" class="selectgroup-input" @if(is_array($permissions) && in_array('Payment Gateways', $permissions)) checked @endif>
                			<span class="selectgroup-button">Payment Gateways</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Home Page" class="selectgroup-input" @if(is_array($permissions) && in_array('Home Page', $permissions)) checked @endif>
                			<span class="selectgroup-button">Home Page</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Table Reservation" class="selectgroup-input" @if(is_array($permissions) && in_array('Table Reservation', $permissions)) checked @endif>
                			<span class="selectgroup-button">Table Reservation</span>
						</label>
						<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Footer" class="selectgroup-input" @if(is_array($permissions) && in_array('Footer', $permissions)) checked @endif>
                			<span class="selectgroup-button">Footer</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Pages" class="selectgroup-input" @if(is_array($permissions) && in_array('Pages', $permissions)) checked @endif>
                			<span class="selectgroup-button">Pages</span>
                		</label>


                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Gallery Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Gallery Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Gallery Management</span>
                		</label>

                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Blogs" class="selectgroup-input" @if(is_array($permissions) && in_array('Blogs', $permissions)) checked @endif>
                			<span class="selectgroup-button">Blogs</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Contact Page" class="selectgroup-input" @if(is_array($permissions) && in_array('Contact Page', $permissions)) checked @endif>
                			<span class="selectgroup-button">Contact Page</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Role Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Role Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Role Management</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Users Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Users Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Users Management</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Language Management" class="selectgroup-input" @if(is_array($permissions) && in_array('Language Management', $permissions)) checked @endif>
                			<span class="selectgroup-button">Language Management</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Backup" class="selectgroup-input" @if(is_array($permissions) && in_array('Backup', $permissions)) checked @endif>
                			<span class="selectgroup-button">Backup</span>
                		</label>
                		<label class="selectgroup-item">
                			<input type="checkbox" name="permissions[]" value="Users" class="selectgroup-input" @if(is_array($permissions) && in_array('Users', $permissions)) checked @endif>
                			<span class="selectgroup-button">Users</span>
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
