@extends('layouts.admin.app')
@section('content')
@if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif


  <form action="{{ route('user.update', $pelanggan->id ) }}" method="POST">
  @csrf
  @method('put')
  <div class="form-group">
      <label>Nama User</label>
      <input type="text" class="form-control" name="name" value="{{ $pelanggan->name }}">
  </div>

  <div class="form-group">
      <label>Email</label>
      <input type="email" class="form-control" name="email" value="{{ $pelanggan->email }}" readonly>
  </div>

  <div class="form-group">
      <label>Alamat</label>
      <input type="text" class="form-control" name="alamat" value="{{ $pelanggan->alamat }}" readonly>
  </div>

  <div class="form-group">
      <label>No HP</label>
      <input type="text" class="form-control" name="nohp" value="{{ $pelanggan->nohp }}" readonly>
  </div>
  

   <div class="form-group">
      <label>Password</label>
      <input type="text" class="form-control" name="password">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update User</button>
  </div>

  </form>
  @endsection