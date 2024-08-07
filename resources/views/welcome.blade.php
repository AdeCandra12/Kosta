<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Kosta - Kosan Kita</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-villa-agency.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

y

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
                    <a href="{{ route('welcome') }}" class="logo">
                        <h1>KOSTA</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      <li><a href="{{ route('welcome') }}" class="active">Home</a></li>
                      <li><a href="{{ route('list') }}"><i class="fa fa-list"></i> List Kosan</a></li>
                      {{-- <li><a href="property-details.html">Property Details</a></li> --}}
                      {{-- <li><a href="contact.html">Contact Us</a></li> --}}
                  </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="main-banner">
    <div class="owl-carousel owl-banner">
      <div class="item item-1">
        <div class="header-text">
          <span class="category">Bandung, <em>Jawa Barat</em></span>
          <h2>KOSTA!<br>Website Katalog Terlengkap daerah kota bandung</h2>
        </div>
      </div>
      <div class="item item-2">
        <div class="header-text">
          <span class="category">Bandung , <em>Jawa Barat</em></span>
          <h2>Cepet!<br>Website Katalog Terbaik Di kota ini</h2>
        </div>
      </div>
      <div class="item item-3">
        <div class="header-text">
          <span class="category">Bandung, <em>Jawa Barat</em></span>
          <h2>Hadir!<br>Katalog kosan the next level</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="featured section">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="left-image">
            <img src="assets/images/featured.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-5">
          <div class="section-heading">
            <h6>| Keunggulan</h6>
            <h2>Katalog Terbaik</h2>
          </div>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Apa Itu KOSTA ?
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                Kosta adalah website katalog kosan yang dibuat untuk memudahkan kamu untuk menemukan kost impian mu dari rumah.</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Kenapa Harus KOSTA ?
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Karna Website kami menawarkan pilihan lokasi yang luas dikota bandung serta memberikan informasi lengkap mulai dari fasilitas didalam kost sampai ke fasilitas diluar kost seperti mini market terdekat.
                </div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  About Us
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  Kosta adalah website yang dibuat oleh Mahasiswa Universitas Logistik dan Bisnis Internasional yaitu Ade Candra dan Muhammad Zidan untuk memenuhi tugas proyek 1, website ini masih dalam tahap pengembangan sehingga dapat berubah sewaktu-waktu
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section best-deal">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="section-heading">
            <h6>| Tentang</h6>
            <h2>Tentang Penulis</h2>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="tabs-content">
            <div class="row">
              <div class="nav-wrapper ">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="appartment-tab" data-bs-toggle="tab" data-bs-target="#appartment" type="button" role="tab" aria-controls="appartment" aria-selected="true">Ade Candra</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="villa-tab" data-bs-toggle="tab" data-bs-target="#villa" type="button" role="tab" aria-controls="villa" aria-selected="false">Muhammad Zidan</button>
                  </li>
                </ul>
              </div>              
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="appartment" role="tabpanel" aria-labelledby="appartment-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>NPM <span>1214048</span></li>
                          <li>Umur <span>21Thn</span></li>
                          <li>Tinggi Badan <span>180 cm</span></li>
                          <li>Berat Badan <span>???</span></li>
                          <li>Tempat Tinggal <span>Bandung</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-01.jpeg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Ade Candra</h4>
                      <p>Ade Candra lahir di Bandung pada tanggal 12 Februari 2003. Pendidikan dasar hingga menengah atasnya ditempuh di berbagai sekolah, mulai dari SDN Melong Mandiri 2 di Bandung, SMPN 24 Bintan di Kepulauan Riau, hingga SMAN 1 Teluk Sebong di Kepulauan Riau. Saat ini, Ade sedang melanjutkan studi di Universitas Logistik dan Bisnis Internasional (ULBI) di Bandung. Dengan ketekunan dan antusiasme yang tinggi, Ade aktif dalam berbagai kegiatan akademik dan organisasi, serta terus mengembangkan keterampilan di bidang teknologi informasi.</p>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="villa" role="tabpanel" aria-labelledby="villa-tab">
                  <div class="row">
                    <div class="col-lg-3">
                      <div class="info-table">
                        <ul>
                          <li>NPM <span>1214043</span></li>
                          <li>Umur <span>21Thn</span></li>
                          <li>Tinggi Badan <span>165 cm</span></li>
                          <li>Berat Badan <span>???</span></li>
                          <li>Tempat Tinggal <span>Bandung</span></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <img src="assets/images/deal-02.jpg" alt="">
                    </div>
                    <div class="col-lg-3">
                      <h4>Muhammad Zidan</h4>
                      <p>Muhammad Zidan Putra yuliadie lahir di Bandung pada 11 Desember 2003.Menempuh pendidikan Mulai dari SDN Banjarsari di bandung,SMPN 7 bandung,dan SMAN 3 bandung.Melatih skill organisasinya di SMA dengan menjadi Ketua dari Seksi IX OSIS LXVII di SMA dan sedang melanjutkan pendidikanya dengan mengambil pendidikan Diploma 4 di Universitas Logistik dan Bisnis Internasional, Bandung. <br><br></p>
                      <div class="icon-button">
                      </div>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
    <div class="container">
      <div class="col-lg-8">
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

  </body>
</html>