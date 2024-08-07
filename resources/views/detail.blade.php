<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Kosta - Detail Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
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
            <li><i class="fa fa-envelope"></i> adecandra1500@gmail.com</li>
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
          <span class="breadcrumb"><a href="#">Home</a>  /  Detail Kosan</span>
          <h3>Detail Kosan</h3>
        </div>
      </div>
    </div>
  </div>

  <div class="single-property section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="main-image">
                    @if($kosan->image)
                        <img src="{{ asset('storage/' . $kosan->image) }}" alt="Image" class="img-fluid">
                    @else
                        <img src="{{ asset('default-image.png') }}" alt="No Image" class="img-fluid">
                    @endif
                </div>
                <div class="main-content">
                    <span class="category">{{ ucfirst($kosan->gender) }}</span>
                    <h4>{{ $kosan->alamat }}</h4>
                    <p><strong>Deskripsi:</strong> {{ $kosan->deskripsi }}</p>
                    <br><br>
                    <p><strong>Fasilitas:</strong> {{ $kosan->fasilitas }}</p>
                    <p><strong>Jumlah Kamar:</strong> {{ $kosan->jmlh_kamar }}</p>
                    <p><strong>Harga:</strong> Rp {{ number_format($kosan->harga, 0, ',', '.') }}</p>
                    <p><strong>Status:</strong> {{ $kosan->status }}</p>
                    <div id="map" style="height: 400px; margin-bottom: 20px;"></div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="info-table">
                    <ul>
                      <li>
                          <img src="assets/images/info-icon-05.png" alt="" style="max-width: 52px;">
                          <h4>Nama Pemilik<br><span>{{ $kosan->pemilik->nama }}</span></h4>
                      </li>
                        <li>
                            <img src="assets/images/info-icon-01.png" alt="" style="max-width: 52px;">
                            <h4>Alamat<br><span>{{ $kosan->pemilik->alamat }}</span></h4>
                        </li>
                        <li>
                            <img src="assets/images/info-icon-02.png" alt="" style="max-width: 52px;">
                            <h4>No Hp<br><span>{{ $kosan->pemilik->no_hp }}</span></h4>
                        </li>
                        <li>
                            <img src="assets/images/info-icon-03.png" alt="" style="max-width: 52px;">
                            <h4>E-mail<br><span>{{ $kosan->pemilik->email }}</span></h4>
                        </li>
                        <div class="gallery">
                          <h4>Gallery</h4>
                          <div class="row ">
                              @foreach($kosan->gallerys as $gallery)
                                  <div class="col-lg-4 col-md-6">
                                      <div class="gallery-item">
                                          <img src="{{ asset('storage/' . $gallery->foto) }}" alt="{{ $gallery->judul }}" class="img-fluid mb-2">
                                          {{-- <h5>{{ $gallery->judul }}</h5> --}}
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                          {{-- <div id="map" style="height: 400px; margin-bottom: 20px;"></div> --}}
                          <a href="{{ route('welcome') }}" class="btn btn-secondary mt-3">Kembali</a>
                      </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
  <footer class="footer-no-gap">
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2024 KOSTA Co., Ltd. All rights reserved.</p>
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

  @push('scripts')
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
          integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
          crossorigin="">
        </script>
  <script>
      var map = L.map('map').setView([{{ $kosan->latitude }}, {{ $kosan->longitude }}], 15);
  
      var kosanIcon = L.icon({
          iconUrl: "{{ asset('assets/img/marker.png') }}",
          iconSize: [50, 50],
          iconAnchor: [25, 50],
          popupAnchor: [0, -50]
      });
  
      L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
          maxZoom: 20,
          subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
      }).addTo(map);
  
      var marker = L.marker([{{ $kosan->latitude }}, {{ $kosan->longitude }}], {icon: kosanIcon}).addTo(map)
          .bindPopup("{{ $kosan->nama }}")
          .openPopup();
  </script>
  @endpush
  

  </body>
</html>