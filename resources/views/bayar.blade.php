@extends('layouts.booking.main')


@section('container')

<section id="mobil">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2><span>Mobil {{ $bk->mobil->jenis_mobil }}</span></h2>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src="{{ asset('storage/' . $bk->mobil->gambar) }}" class="img-fluid" alt="" style="width: 550px; height: 280px;">
                        </div>
                            <br>
                            <br>
                            <div class="member-info">
                            <h3>Berkapasitas {{ $bk->mobil->kapasitas }} Orang (Include Driver)</h3>
                            <h4>Harga sewa Rp. {{ $bk->mobil->harga }} /Hari</h4>
                            <br>
                            <br>
                            <h5>Pembayaran Silahkan transfer melalui Bank xyz No.Rek: xxxxxx /an xyz</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-mt-7 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="card fat">
                        <div class="card-body">
                            <form action="/bayar/{{ $bk->kode_booking }}" method="POST" class="my-login-validation" enctype="multipart/form-data">
                                @csrf

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

                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Masukan Bukti Pembayaran</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar">      
                                </div>
                    
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-success btn-block"> 
                                        Konfirmasi
                                    </button>
                                </div>

                                
                            </form>
                            <div class="mt-3">
                                <a href="/list-booking" class="btn btn-danger btn-block" name="booking"> 
                                    Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
