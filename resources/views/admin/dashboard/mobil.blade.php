@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Tabel Mobil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tabel Mobil</li>
    </ol>
    <div class="card shadow mb-4">
            <div class="card-body">
            <a href="/admin-tambah-mobil" type="button" class="btn btn-success mb-3">Tambah Mobil</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="#" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Mobil</th>
                                <th>Kapasitas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cars as $car)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $car->jenis_mobil }} </td>
                                <td> {{ $car->kapasitas }} </td>
                                <td>
                                <button type='button' class='btn btn-danger' data-toggle='modal'>Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

@endsection