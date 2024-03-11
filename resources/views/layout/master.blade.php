<!DOCTYPE html>
<html lang="en">
  <head>
    <title>WORKSHOP ELEKTRO</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('/main/icon.ico') }}">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" 
    href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('/css/open-iconic-bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/aos.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/ionicons.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap-datepicker.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/jquery.timepicker.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/icomoon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/main/style.css') }}" type="text/css">

  </head>
  <body>
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <div class="navbar-brand">
          <img src="{{ asset('main/logo.png') }}" alt="Logo" class="logo">
          WSE
        </div>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('nav_index')"><a href="{{ route('utama') }}" class="nav-link">Halaman Utama</a></li>
                <li class="nav-item @yield('nav_it')"><a href="{{ route('it') }}" class="nav-link">Divisi IT</a></li>
                <li class="nav-item @yield('nav_projas')"><a href="{{ route('projas') }}" class="nav-link">Divisi Projas</a></li>
                <li class="nav-item @yield('nav_pc')"><a href="{{ route('pc') }}" class="nav-link">Divisi PC</a></li>
                <li class="nav-item @yield('nav_robotik')"><a href="{{ route('robotik') }}" class="nav-link">Divisi Robotik</a></li>
                <li class="nav-item @yield('nav_struktur')"><a href="{{ route('struktur') }}" class="nav-link">Struktur Kepengurusan</a></li>
              </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

@yield('content')

<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
            <h2 class="ftco-heading-2"><div class="logo">Workshop&nbsp;<span>Elektro</span></div></h2>
            <p>Workshop Elektro atau disingkat WSE adalah sebuah organisasi yang berrgerak dalam bidang penalan dan keilmuan.</p>
            <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
              <li class="ftco-animate"><a href="https://youtube.com/@workshopelektrouniversitas3315"><span class="fa-brands fa-youtube"></span></a></li>
              <li class="ftco-animate"><a href="https://www.tiktok.com/@workshopelektroum?_t=8cy3XAIHY1a&_r=1"><span class="fa-brands fa-tiktok"></span></a></li>
              <li class="ftco-animate"><a href="https://www.instagram.com/workshopelektro_um/"><span class="fa-brands fa-instagram"></span></a></li>
            </ul>
          </div>
        </div>
        <div class="col-md">
        </div>
        <div class="col-md">
          <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2"></h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Jl. Semarang No.5 - Gedung G4 115, Sumbersari, Kec. Lowokwaru, Kota Malang, Jawa Timur, Indonesia</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">(+62341)573090</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">elektro.ft@um.ac.id</span></a></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 text-center">

          <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Workshop Elektro UM</p>
        </div>
      </div>
    </div>
  </footer>
  


<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  
</body>
</html>