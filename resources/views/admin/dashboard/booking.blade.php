@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Tabel Booking</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tabel Booking</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="#" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis Mobil</th>
                            <th>Tanggal Booking</th>
                            <th>Tanggal Pinjam</th>
                            <th>Lama Sewa</th>
                            <th>Total Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $bk)
                        <tr>
                            <td> {{ $bk->users->name }} </td>
                            <td> {{ $bk->mobil->jenis_mobil }} </td>
                            <td> {{ date('d-m-Y', strtotime($bk->created_at)) }} </td>
                            <td> {{ $bk->tgl_pinjam }} </td>
                            <td> {{ $bk->lama_pinjam }} Hari</td>
                            <td> {{ $bk->total_harga }} </td>
                            <td> <a href="/detail/{{ $bk->id }}/konfirmasi" class="btn btn-info">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection