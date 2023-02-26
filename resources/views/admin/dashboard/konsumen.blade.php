@extends('layouts.dashboard.main')

@section('container')

<div class="container-fluid">
    <h1 class="mt-4">Tabel konsumen</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Tabel Konsumen</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="#" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td> {{ $user->name }} </td>
                            <td> {{ $user->username }} </td>
                            <td>
                                <form action="/delete-konsumen/{{ $user->id }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
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