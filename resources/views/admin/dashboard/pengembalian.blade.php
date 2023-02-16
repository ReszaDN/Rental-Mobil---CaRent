@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Pengembalian Mobil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pengembalian Mobil</li>
    </ol>
    <form class="user px-5" action="#" method="POST">
        <div class="container">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Peminjaman</label>
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
                <label for="kode" class="form-label">Kode Peminjaman</label>
                <input type="text" class="form-control" id="kode" name="kode" value="" disabled>
            </div>
            
            <div class="mb-3">
                <label for="lama" class="form-label">Lama Pinjam</label>
                <input type="text" class="form-control" id="lama" name="lama" value="" disabled>
            </div> 
            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Pengembalian</label>
                <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
            </div>
            <div class="mb-3">
                <label for="lambat" class="form-label">Keterlambatan /Hari</label>
                <input type="text" class="form-control" id="lambat" name="lambat">
            </div>
                <button type="submit"class="btn btn-primary btn-user btn-block" name="kembali" target="_blank">
                    Submit
                </button>
        </div>
    </form>
</div>

@endsection