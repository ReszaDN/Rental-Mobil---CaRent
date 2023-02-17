@extends('layouts.dashboard.main')


@section('container')

<div class="container-fluid">
                        <h1 class="mt-4">Tambah Mobil</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Mobil</li>
                        </ol>
                        <form class="user px-5" action="/tambah-mobil" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="container">
                                <div class="mb-3">
                                    <label for="jenis_mobil" class="form-label">Nama Mobil</label>
                                    <input type="text" class="form-control @error('jenis_mobil') is-invalid @enderror" id="jenis_mobil" name="jenis_mobil">
                                
                                    @error('jenis_mobil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                <div class="mb-3">
                                    <label for="harga" class="form-label">Harga</label>
                                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga">
                                
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                
                                </div>
                                <div class="mb-5">
                                    <label for="kapasitas" class="form-label">Kapsitas</label>
                                    <select class="form-control" id="kapasitas" name="kapasitas">
                                        <option value="--">--</option>
                                        <option value="4">4 Orang (Include Driver)</option>
                                        <option value="8">8 Orang (Include Driver)</option>
                                    </select>
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                                    <button type="submit"class="btn btn-primary btn-user btn-block" name="tambah">
                                        Tambah Data
                                    </button>
                        </form>
                    </div>

@endsection