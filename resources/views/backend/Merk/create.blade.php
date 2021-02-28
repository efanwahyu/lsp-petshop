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


  <form action="{{ route('merk.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
      <label>Nama</label>
      <input type="text" class="form-control" name="nama">
  </div>
  
  <div class="form-group">
      <label>Merk</label>
      <input type="text" class="form-control" name="merk">
  </div>
  
  <div class="form-group">
      <label>Thumbnail</label>
      <input type="file" name="gambar" class="form-control">
  </div>

  <div class="form-group">
      <button class="btn btn-primary btn-block">Simpan Merk</button>
  </div>

  </form>


@endsection