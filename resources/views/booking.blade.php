@extends('layouts.booking.main')


@section('container')

<section id="mobil">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2><span>Mobil {{ $car->jenis_mobil }} </span></h2>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <div class="member-img">
                            <img src=" {{ asset('storage/' . $car->gambar) }} " class="img-fluid" alt="" style="width: 550px; height: 280px;">
                        </div>
                        <br>
                        <br>
                        <div class="member-info">
                        <h3>Berkapasitas {{ $car->kapasitas }} Orang (Include Driver)</h3>
                        <h4>Harga sewa Rp.  {{ $car->harga }}/Hari</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-mt-7 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="card fat">
                        <div class="card-body">
                            <form action="/booking-mobil" method="POST" class="my-login-validation" novalidate="">

                                <div class="form-group">
                                    <label for="tgl_sewa">Tanggal Sewa</label>
                                    <input id="tgl_sewa" type="date" class="form-control" name="tgl_sewa" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lama">Lama Sewa (/Hari)</label>
                                    <input id="lama" type="text" class="form-control" name="lama" required>
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                    
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-success btn-block" name="booking"> 
                                        Booking
                                    </button>
                                </div>
                            </form>
                            <div class="mt-3">
                                <a href="/home" class="btn btn-danger btn-block" name="booking"> 
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
