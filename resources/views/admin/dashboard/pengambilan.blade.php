@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Pengambilan Mobil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengambilan Mobil</li>
    </ol>
    <form class="user px-5" action="#" method="POST">
        <div class="container">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Booking</label>
                <input type="kode" class="form-control" id="kode" name="kode">
            </div>
                <button type="submit"class="btn btn-primary btn-user btn-block" name="cek">
                    Check Data
                </button>
        </div>
    </form>
    <!-- Proses Cek Data Booking -->
    <br>
    <br>
    <br>
    <form class="user px-5" action="#" method="POST">
        <div class="container">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Booking</label>
                <input type="text" class="form-control" id="kode" name="kode" value="" disabled>
            </div>
            
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="" disabled>
            </div> 
            
            <div class="mb-3">
                <label for="tgl_book" class="form-label">Tanggal Booking</label>
                <input type="text" class="form-control" id="tgl_book" name="tgl_book" value="" disabled>
            </div>
            
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Mobil</label>
                <input type="text" class="form-control" id="jenis" name="jenis" value="" disabled>
            </div>
            
            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal Peminjaman</label>
                <input type="text" class="form-control" id="tgl_pinjam" name="tgl_pinjam" value="" disabled>
            </div>
            
            <div class="mb-3">
                <label for="lama" class="form-label">Lama Pinjam</label>
                <input type="numeric" class="form-control" id="lama" name="lama" value="" disabled>
            </div>
            
            <div class="mb-3">
                <label for="harga" class="form-label">Total Harga</label>
                <input type="text" class="form-control" id="harga" name="harga" value="" disabled>
            </div>

            <div class="mb-3">
                <label for="ket" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" value="" disabled>
            </div>
                <button type="submit"class="btn btn-primary btn-user btn-block" name="pinjam">
                    Submit
                </button>
        </div>
    </form>
</div>

@endsection