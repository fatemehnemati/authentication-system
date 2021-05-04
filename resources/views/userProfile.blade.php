@extends('layout.panel')

@section('content')

<div class="content-wrapper">
    <div class="content">
        @if (Session::has('message'))
        <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        @endif						 
<form action="/updateProfile" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">profilePhoto</label>
      <br>
      @if(Auth::user()->status == 0)
      <img src="{{ asset('image/profile/profileDefault.png') }}" style="border-radius: 50px ; width:150px;height:130px">
      @else
      <img src="{{ $user->profile_photo_path }}" style="border-radius: 50px">
      <br>
      <br>
        {{-- <button type="button" class="btn btn-small btn-danger" name="status" >delete
          
        </button> --}}
      @endif
      <br>
      <input type="file" class="form-control" name="profilePhoto">
      
    </div>

    {{-- @if ($this->user->profile_photo_path)
    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
        {{ __('Remove Photo') }}
    </x-jet-secondary-button>
    @endif --}}

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