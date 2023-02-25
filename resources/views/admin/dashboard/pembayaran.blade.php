@extends('layouts.dashboard.main')

@section('container')

<section id="mobil">
    <div class="container" data-aos="fade-up">
        <div class="container mt-5">
            <div class="row">
                <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/' . $bk->bukti_byr)}}" class="card-img-top" alt="..." style="width: 18rem; height: 500px;">
                </div>
                <div class="col-lg-5 col-mt-7 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="card fat">
                        <div class="card-body">
                            <form action="/detail/{{ $bk->id }}" method="POST" class="my-login-validation" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="kodeBK">Kode Booking</label>
                                    <input id="kodeBK" type="text" class="form-control" name="kodeBK" value="{{ $bk->kode_booking }}" readonly>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Kosumen</label>
                                    <input id="nama" type="text" class="form-control" name="nama" value="{{ $bk->users->name }}" readonly>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                                    <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ $bk->tgl_pinjam }}" readonly>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lama_pinjam">Lama Pinjam (/Hari)</label>
                                    <input id="lama_pinjam" type="text" class="form-control" name="lama_pinjam" value="{{ $bk->lama_pinjam }}" readonly>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="total_harga">Total Harga</label>
                                    <input id="total_harga" type="text" class="form-control" name="total_harga" value="{{ $bk->total_harga }}" readonly>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                    
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-success btn-block"> 
                                        Konfirmasi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection