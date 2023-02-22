@extends('layouts.main')


@section('container')

  <!-- ==== Mobil ==== -->
  <section id="mobil">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2><span>Pilih</span> Mobil</h2>
        </div>
        <div class="row">
            @foreach($cars as $car)
              <div class='col-lg-3 col-md-6 d-flex align-items-stretch'>
                  <div class='card shadow h-100' style='width: 18rem;'>
                    <img src="{{ asset('storage/' . $car->gambar) }}" class='card-img-top' alt='' style='width: 257px; height: 177px;'>
                    <div class='card-body'>
                      <h5 class='card-title'> {{ $car->jenis_mobil }} </h5>
                      <p class='card-text'>Kapasitas untuk {{ $car->kapasitas }} Orang (Include Driver)</p>
                      <p class='card-text'>Rp.{{ $car->harga }} /Hari</p>
                      <a href='/booking/{{ $car->id }}' class='btn btn-primary'>Booking</a>
                    </div>
                  </div>
              </div>
            @endforeach
        </div>
        </div>
      </div>
    </section>
  <!-- End Mobil -->



  <!-- ==== About Us ==== -->
    <section id="about" class="cta">
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="section-title">
            <h2><span>About Us</span></h2>
            <h3>CaRent</h3>
            <h4>Adalah sebuah website yang menyediakan jasa rental mobil dengan harga yang bersahabat dengan dompet konsumen. Untuk info lebih lanjut silahkan cek media kami.</h4>
            <br>
            
          </div>
        </div>
      </div>
    </section>
  <!-- End About Us -->

@endsection