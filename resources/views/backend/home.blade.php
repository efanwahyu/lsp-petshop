@extends('layouts.admin.app')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
    @endif
    <h1>Halaman Admin</h1>
    <p>Ini adalah halaman admin!</p>
@endsection