@extends('layout.panel')

@section('content')

<div class="content-wrapper">
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif						 
<form action="/updatePassword" method="POST">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Current Password</label>
        <input type="password" class="form-control" name="currentPassword" id="currentPassword" placeholder="enter your current password">
        @error('currentPassword')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
   
    <div class="form-group">
        <label for="exampleInputEmail1">New Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="enter your new password">
        @error('password')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="enter your confirm password">
        @error('password_confirmation')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
</div>

@endsection('content')