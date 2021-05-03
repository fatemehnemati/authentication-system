@extends('layout.panel')

@section('content')

<div class="content-wrapper">
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif						 
<form action="/updateProfile" method="POST">
    @csrf

    <div class="form-group">
        <label for="exampleInputEmail1">Name</label>
        <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{ $user->name }}">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">bio</label>
        <textarea name="bio" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $user->bio }}</textarea>
    </div>
    
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $user->email }}">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
    </div>
</div>

@endsection('content')