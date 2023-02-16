@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Pencetakan Struk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Pencetakan Struk</li>
    </ol>
    <form class="user px-5" action="struk.php" method="POST">
        <div class="container">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode Peminjaman</label>
                <input type="kode" class="form-control" id="kode" name="kode">
            </div>
                <button type="submit"class="btn btn-primary btn-user btn-block" name="cetak">
                    Cetak Struk
                </button>
        </div>
    </form>
</div>

@endsection