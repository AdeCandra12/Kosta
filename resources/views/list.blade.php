<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Kosta - Kosan Kita</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8">
          <ul class="info">
            <li><i class="fa fa-envelope"></i>adecandra1500@gmail.com</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <h1>Villa</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('welcome') }}" class="active">Home</a></li>
                        <li><a href="{{ route('list') }}"><i class="fa fa-list"></i> List Kosan</a></li>
                        {{-- <li><a href="property-details.html">Property Details</a></li> --}}
                        {{-- <li><a href="contact.html">Contact Us</a></li> --}}
                    </ul> 
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <span class="breadcrumb"><a href="{{ route('welcome') }}">Home</a> / List Kosan</span>
          <h3>List kosan</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="section properties">
      <div class="container">
        <h1 class="my-4 text-center">Daftar Kosan</h1>
        <div class="row properties-box">
            @foreach($kosans as $kosan)
                <div class="col-lg-4 col-md-6 align-self-center mb-30 properties-items col-md-6 adv">
                    <div class="item">
                        @if($kosan->image)
                            <a href="{{ url('detail/' . $kosan->id) }}"><img src="{{ asset('storage/' . $kosan->image) }}" alt="Image" style="height: 200px; object-fit: cover;"></a>
                        @else
                            <a href="{{ url('detail/' . $kosan->id) }}"><img src="{{ asset('default-image.png') }}" alt="No Image" style="height: 200px; object-fit: cover;"></a>
                        @endif
                        <span class="category">{{ $kosan->status }}</span>
                        <h6>{{ 'Rp ' . number_format($kosan->harga, 0, ',', '.') }}</h6>
                        <h4><a href="{{ url('detail/' . $kosan->id) }}">{{ $kosan->nama }}</a></h4>
                        <ul>
                            <li>Alamat: <span>{{ $kosan->alamat }}</span></li>
                            <li>Gender: <span>{{ ucfirst($kosan->gender) }}</span></li>
                            <li>Jumlah Kamar: <span>{{ $kosan->jmlh_kamar }}</span></li>
                        </ul>
                        <div class="main-button">
                            <a href="{{ url('detail/' . $kosan->id) }}" class="btn btn-success">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2024 Kosta.id All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js-temp/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/counter.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>

  </body>
</html>