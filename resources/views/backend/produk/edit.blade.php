@extends('layouts.admin.app')
@section('content')
@if(count($errors)>0)
  	@foreach($errors->all() as $error)
  	<div class="alert alert-danger" role="alert">
      {{ $error }}
	</div>  		
  	@endforeach
  @endif

  @if(Session::has('success'))
  	<div class="alert alert-success" role="alert">
      {{ Session('success') }}
	</div> 
  	
  @endif

  <form action="{{ route('tester.update', $barang->id ) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="form-group">
      <label>Nama Produk</label>
      <input type="text" class="form-control" name="nama">
  </div>
  
  <div class="form-group">
      <label>Harga</label>
      <input type="text" class="form-control" name="harga">
  </div>

  <div class="form-group">
      <label>Merk</label>
      <input type="text" class="form-control" name="merk_id">
  </div>

  <div class="form-group">
      <label>is ready</label>
      <input type="text" class="form-control" name="is_ready">
  </div>

  <div class="form-group">
      <label>jenis</label>
      <input type="text" class="form-control" name="jenis">
  </div>

  <div class="form-group">
      <label>berat</label>
      <input type="text" class="form-control" name="berat">
  </div>
  
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Update Kategori</button>
  </div>

  </form>

@endsection