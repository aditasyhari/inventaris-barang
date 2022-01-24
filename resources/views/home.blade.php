<!DOCTYPE html>
<html lang="en">
<head>
  <title>Inventaris Barang SMK Negeri Ihya’ Ulumudin</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/vendors/owl-carousel/css/owl.theme.default.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/vendors/aos/css/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.min.css') }}">
</head>
<body id="body" data-spy="scroll" data-target=".navbar" data-offset="100">
  <header id="header-section">
    <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
    <div class="container">
      <div class="navbar-brand-wrapper d-flex w-100">
        <img src="{{ asset('image/logo.png') }}" style="max-height: 50px" alt="">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="mdi mdi-menu navbar-toggler-icon"></span>
        </button> 
      </div>
      <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
        <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
          <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
            <div class="navbar-collapse-logo">
              <img src="{{ asset('image/logo.png') }}" style="max-height: 50px" alt="">
            </div>
            <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
            </button>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#header-section">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#digital-marketing-section">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#case-studies-section">Bengkel</a>  
          </li>
          <li class="nav-item btn-contact-us pl-4 pl-lg-0">
              @if(Auth::user())
              <a href="{{ url('/dashboard') }}" class="btn btn-success">Dashboard</a>
              @else
              <a href="{{ url('/login') }}" class="btn btn-success">Login</a>
              @endif
          </li>
        </ul>
      </div>
    </div> 
    </nav>   
  </header>
  <div class="banner" >
    <div class="container">
      <h1 class="font-weight-semibold">Inventaris Barang<br>SMK Negeri Ihya’ Ulumudin</h1>
      <h6 class="font-weight-normal text-muted pb-3">Website Sistem Informasi peminjaman barang praktik jurusan Teknik Kendaraan Ringan.</h6>
      <img src="{{ asset('frontend/images/Group171.svg') }}" alt="" class="img-fluid">
    </div>
  </div>
  <div class="content-wrapper mt-3">
    <div class="container">
      <section class="digital-marketing-service" id="digital-marketing-section">
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 grid-margin grid-margin-lg-0" data-aos="fade-right">
            <h3 class="m-0">Jurusan (TKR)<br>Teknik Kendaraan Ringan</h3>
            <div class="col-lg-7 col-xl-6 p-0">
              <p class="py-4 m-0 text-muted">adalah suatu jurusan yang mempelajari materi otomotif yang membahas cara perbaikan, perawatan kendaraan ringan seperti mobil baik tenaga diesel maupun tenaga bensin dan sepeda motor, sekaligus mengenalkan bagian-bagian pada mobil.</p>
              <!-- <p class="font-weight-medium text-muted"></p> -->
            </div>    
          </div>
          <div class="col-12 col-lg-5 p-0 img-digital grid-margin grid-margin-lg-0" data-aos="fade-left">
            <img src="{{ asset('frontend/images/Group1.png') }}" alt="" class="img-fluid">
          </div>
        </div>
        <div class="row align-items-center">
          <div class="col-12 col-lg-7 text-center flex-item grid-margin" data-aos="fade-right">
            <img src="{{ asset('frontend/images/Group2.png') }}" alt="" class="img-fluid">
          </div>
          <div class="col-12 col-lg-5 flex-item grid-margin" data-aos="fade-left">
            <h3 class="m-0">Jurusan TKR<br>cukup di minati</h3>
            <div class="col-lg-9 col-xl-8 p-0">
              <p class="py-4 m-0 text-muted">karena fasilitasnya yang cukup lengkap, mulai dari mesin 2 dan 4 tak mesin diesel dan bensin, mesin mobil, power stering test, dan alat peraga lainnya yang membuat siswa mengerti secara detail isi dari sebuah mobil diesel maupun bensin dan isi dari sepeda motor.</p>
              <!-- <p class="pb-2 font-weight-medium text-muted"></p> -->
            </div>
          </div>
        </div>
      </section>     
      <section class="case-studies" id="case-studies-section">
        <div class="row grid-margin">
          <div class="col-12 text-center pb-5">
            <h2>Ada 3 Bengkel</h2>
            <h6 class="section-subtitle text-muted">Jam kerja : 07.00 – 16.00 WIB</h6>
          </div>
          <div class="col-12 col-md-4 col-lg-4 stretch-card mb-3 mb-lg-0" data-aos="zoom-in">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-primary text-center card-contents">
                  <div class="card-image">
                    <img src="{{ asset('frontend/images/Group95.svg') }}" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Bengkel Mesin</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <!-- <h6 class="m-0 pb-1">Bengkel Mesin</h6> -->
                    <p>Mesin</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-4 stretch-card mb-3 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-violet text-center card-contents">
                  <div class="card-image">
                      <img src="{{  asset('frontend/images/Group126.svg') }}" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Bengkel Chasis</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <p>Chasis</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-4 stretch-card" data-aos="zoom-in" data-aos-delay="600">
            <div class="card color-cards">
              <div class="card-body p-0">
                <div class="bg-success text-center card-contents">
                  <div class="card-image">
                      <img src="{{  asset('frontend/images/Group115.svg') }}" class="case-studies-card-img" alt="">
                  </div>  
                  <div class="card-desc-box d-flex align-items-center justify-content-around">
                    <div>
                      <h6 class="text-white pb-2 px-3">Bengkel Kelistrikan</h6>
                    </div>
                  </div>
                </div>   
                <div class="card-details text-center pt-4">
                    <p>Kelistrikan</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>     
      <section class="contact-us" id="contact-section">
        <div class="contact-us-bgimage grid-margin" >
          <div class="pb-4">
            <h4 class="px-3 px-md-0 m-0" data-aos="fade-down">Kontak Kami</h4>
            <!-- <h4 class="pt-1" data-aos="fade-down">Contact us</h4> -->
          </div>
          <div data-aos="fade-up">
            <!-- <button class="btn btn-rounded btn-outline-danger">Contact us</button> -->
            <a href="#" class="btn btn-rounded btn-outline-success mx-1"><span class="mdi mdi-facebook"></span></a>
            <a href="#" class="btn btn-rounded btn-outline-success mx-1"><span class="mdi mdi-twitter"></span></a>
            <a href="#" class="btn btn-rounded btn-outline-success mx-1"><span class="mdi mdi-instagram"></span></a>
            <a href="#" class="btn btn-rounded btn-outline-success mx-1"><span class="mdi mdi-linkedin"></span></a>
            <a href="#" class="btn btn-rounded btn-outline-success mx-1"><span class="mdi mdi-instagram"></span></a>
            <a href="#" class="btn btn-rounded btn-outline-success mx-1"><span class="mdi mdi-linkedin"></span></a>
          </div>          
        </div>
      </section>
      <footer class="border-top">
        <p class="text-center text-muted pt-4">Copyright © 2022 Inventaris Barang</p>
      </footer>

    </div> 
  </div>
  <script src="{{ asset('frontend/vendors/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('frontend/vendors/bootstrap/bootstrap.min.js') }}"></script>
  <script src="{{ asset('frontend/vendors/owl-carousel/js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('frontend/vendors/aos/js/aos.js') }}"></script>
  <script src="{{ asset('frontend/js/landingpage.js') }}"></script>
</body>
</html>