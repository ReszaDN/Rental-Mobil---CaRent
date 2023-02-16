@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Tabel Mobil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tabel Mobil</li>
    </ol>
    <div class="card shadow mb-4">
            <div class="card-body">
            <a href="#" type="button" class="btn btn-success mb-3">Tambah Mobil</a>
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
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

@endsection