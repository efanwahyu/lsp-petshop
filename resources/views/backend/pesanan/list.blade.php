@extends('layouts.admin.app')
@section('content')
	
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
        <tr>
            <td>No.</td>
            <td>Tanggal Pesan</td>
            <td>Kode Pemesanan</td>
            <td>Pesanan</td>
            <td>Status</td>
            <td><strong>Total Harga</strong></td>
            <td>Pelanggan</td>
        </tr>
		</thead>
		<?php $no = 1 ?>
                        @forelse ($list as $result => $pesanan)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $pesanan->created_at }}</td>
                            <td>{{ $pesanan->kode_pemesanan }}</td>
                            <td>
                                <?php $pesanan_details = \App\PesananDetail::where('pesanan_id', $pesanan->id)->get(); ?>
                                @foreach ($pesanan_details as $pesanan_detail)
                                <img src="{{ url('assets/jersey') }}/{{ $pesanan_detail->product->gambar }}"
                                    class="img-fluid" width="50">
                                {{ $pesanan_detail->product->nama }}
                                <br>
                                @endforeach
                            </td>
                            <td>
                                @if($pesanan->status == 1)
                                Belum Lunas
                                @else
                                Lunas
                                @endif
                            </td>
                            <td><strong>Rp. {{ number_format($pesanan->total_harga) }}</strong></td>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Data Kosong</td>
                        </tr>
                        @endforelse

		</tbody>
	</table>
	
	
@endsection