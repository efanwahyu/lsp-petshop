@extends('layouts.admin.app')
@section('content')
	
	<br><br>
	<a href="{{ route('tester.create') }}" class="btn btn-info btn-sm">Tambah Produk</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>harga</th>
				<th>Merk</th>
                <th>is ready</th>
				<th>jenis</th>
				<th>berat</th>
				<th>Thumbnail</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($barang as $result => $hasil)
			<tr>
                <td>{{ $hasil->id }}</td>
				<td>{{ $hasil->nama }}</td>
				<td>{{ $hasil->harga }}</td>
                <td>{{ $hasil->merk_id }}</td>
				<td>{{ $hasil->is_ready }}</td>
                <td>{{ $hasil->jenis }}</td>
				<td>{{ $hasil->berat }}</td>
				
				<td><img src="{{ asset( $hasil->gambar ) }}" class="img-fluid" style="width:100px"></td>
				<td>
					<form action="{{ route('tester.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('tester.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	
	
@endsection