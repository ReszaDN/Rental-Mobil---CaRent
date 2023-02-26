 
 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="/"><img src="img/LogoWeb.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      @auth
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#mobil">Mobil</a></li>
            <li class="drop-down"><a href="">Bukti</a>
              <ul>
                <li><a href="/list-booking">Bukti Booking</a></li>
              </ul>
            </li>
            <li><a href="#about">About Us</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      @else
        <nav class="nav-menu d-none d-lg-block">
          <ul>
            <li class="active"><a href="/">Home</a></li>
            <li><a href="#mobil">Mobil</a></li>
            <li><a href="#about">About Us</a></li>
          </ul>
        </nav><!-- .nav-menu -->
      @endauth

      @auth
      <a href="{{ route('logout') }}" class="get-started-btn scrollto"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
      </form>
      @else
        <a href="/login" class="get-started-btn scrollto">Login</a>
      @endauth
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Welcome to <span>CaRent</span></h1>
          <h2>Daftar untuk Merental Mobil</h2>
          <div class="d-lg-flex">
          </div>
        </div>
        <div class="col-lg-5   order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
    </div>
  </section><!-- End Hero -->
  