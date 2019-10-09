@extends('admin.layout')

@section('content')

 <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('admin/home') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="{{ url('admin/users') }}">Users</a>
      </li>
    <li class="breadcrumb-item active">Create</li>
 </ol>

<form method="POST" enctype="multipart/form-data" action="{{ route('users.store') }}">
	@csrf
	<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{ old('name') }}">
    @if($errors->has('name'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
  	<label for="exmail">Email address</label>
    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{ old('email') }}">
    @if($errors->has('email'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
    @if($errors->has('password'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" placeholder="Image" name="image">
    @if($errors->has('image'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group">
    <label for="admin">Admin</label>
    <select class="form-control" id="admin" name="admin">
      <option value="0" selected="selected">Member</option>
      <option value="1">Admin</option>
     
    </select>
   @if($errors->has('admin'))
        <span class="invalid-feedback" role="alert" style="display: block;">
            <strong>{{ $errors->first('admin') }}</strong>
        </span>
    @endif
  </div>

  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="block" name="block">
    <label class="form-check-label" for="block">Block</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection