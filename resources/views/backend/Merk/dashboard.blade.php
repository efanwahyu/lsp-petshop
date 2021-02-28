@extends('layouts.admin.app')
@section('content')
	
	<br><br>
	<a href="{{ route('merk.create') }}" class="btn btn-info btn-sm">Tambah Merk</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Merk</th>
                <th>Gambar</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($merek as $result => $hasil)
			<tr>
                <td>{{ $hasil->id }}</td>
				<td>{{ $hasil->nama }}</td>
				<td>{{ $hasil->merk }}</td>
				
				<td><img src="{{ asset( $hasil->gambar ) }}" class="img-fluid" style="width:100px"></td>
				<td>
					<form action="{{ route('merk.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('merk.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	
	
@endsection