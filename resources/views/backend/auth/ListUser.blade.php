@extends('layouts.admin.app')
@section('content')
	
	
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama User</th>
				<th>Email</th>
				<th>Alamat</th>
                <th>No HP</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($pelanggan as $result => $hasil)
			<tr>
				<td>{{ $result + $pelanggan->firstitem() }}</td>
				<td>{{ $hasil->name }}</td>
				<td>{{ $hasil->email }}</td>
				<td>{{ $hasil->alamat }}</td>
				<td>{{ $hasil->nohp }}</td>
                <td>
					<form action="{{ route('user.destroy', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<a href="{{ route('user.edit', $hasil->id ) }}" class="btn btn-primary btn-sm">Edit</a>
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach

		</tbody>
	</table>
	
	
@endsection