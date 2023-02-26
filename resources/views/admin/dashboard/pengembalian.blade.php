@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Pengembalian Mobil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengembalian Mobil</li>
    </ol>
    <form class="user px-5" action="/admin-pengembalian" method="GET">
        <div class="container">
            <div class="mb-3">
                <label for="search" class="form-label">Kode Booking</label>
                <input type="text" class="form-control" id="cearch" name="search" placeholder="Search..." value="{{ request('search') }}">
            </div>
                <button type="submit"class="btn btn-primary btn-user btn-block">
                    Check Data
                </button>
        </div>
    </form>


    <!-- Proses Cek Data Booking -->
    <!-- Proses Cek Data Booking -->
    <br>
    <br>
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="#" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Booking</th>
                            <th>Jenis Mobil</th>
                            <th>Tanggal Pengambilan</th>
                            <th>Estimasi Pengembalian</th>
                            <th>Status Mobil</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{ error_reporting(0) }}
                        @foreach($bookings as $bk)
                        <tr>
                            <td> {{ $bk->kode_booking }} </td>
                            <td> {{ $bk->mobil->jenis_mobil }} </td>
                            <td> {{ $bk->tgl_pinjam }} </td>
                            <td> {{ date('d-m-Y', strtotime('+' . $bk->lama_pinjam . 'days', strtotime($bk->tgl_pinjam))) }} </td>
                            <td> {{ $bk->status_mobil }} </td>
                            <td>
                                @if( $bk->status_mobil == 'Keluar' )
                                <form action="/pengembalian/{{ $bk->id }}" method="post">
                                    @csrf
                                    <button type='submit' class='btn btn-success' data-toggle='modal'><i class="fas fa-check-square"></i></button>
                                </form>
                                @else
                                <form action="/cetak/{{ $bk->id }}" method="post">
                                    @csrf
                                    <button type='submit' class='btn btn-warning' data-toggle='modal'><i class="fas fa-print"></i></button>    
                                </form>
                                @endif
                                
                            </td>   
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Akhir Cek Data -->
</div>

@endsection