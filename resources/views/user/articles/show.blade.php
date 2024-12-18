<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Walk Together</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo/walktogether.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo/walktogether.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="{{ asset('https://fonts.googleapis.com') }}" rel="preconnect">
  <link href="{{ asset('https://fonts.gstatic.com')}}" rel="preconnect" crossorigin>
  <link href="{{ asset('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap')}}" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- Custom Styles for Article Page -->
  <style>
    .custom-frame {
      width: 100%;
      height: 300px;
      object-fit: cover;
      border: 5px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo/walktogether.png" alt="">
        <h1 class="sitename">Walk Together</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/dashboard#home" class="active">Home</a></li>
          <li><a href="/dashboard#about">Informasi Program</a></li>
          <li><a href="/dashboard#features">Tips & Trik</a></li>
          <li><a href="/dashboard#class">Kelas</a></li>
          <li><a href="/dashboard#komunitas">Komunitas</a></li>
          <li><a href="/dashboard#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="/login">Logout</a>
    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Informasi mapres <span>Sobat Wato!</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Raih Peluang Akademis dan Karirmu<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Informasi Program</a>
            <a href="https://youtu.be/jTBy1ujJuUE?si=1EaaegYMaZtx8x7a" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
          <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section light-background">
      <div class="container">
        <div class="row gy-4">
          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a class="stretched-link">Melangkah</a></h4>
                <p class="description">Jangan takut untuk mencoba, karena kesalahan adalah bagian dari proses belajar.</p>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a class="stretched-link">Kesuksesan</a></h4>
                <p class="description">Kesuksesan tidak datang dengan mudah. Tetaplah berjuang dan berusaha!</p>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a class="stretched-link">Mengubah Dunia</a></h4>
                <p class="description">Pendidikan adalah senjata paling kuat yang bisa kamu gunakan untuk mengubah dunia.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Article Content Section -->
    <div class="container mt-5">
      <h2>{{ $article->title }}</h2>
      <!-- Display image if available -->
      @if($article->image)
      <img src="{{ asset('uploads/'.$article->image) }}" alt="Gambar Artikel" class="custom-frame">
      @endif
        <br><br><br>
      <div>
        {!! $article->content !!}
      </div>
    </div>

  </main>

  <footer class="bg-light py-4 mt-5">
    <div class="container text-center">
      <p class="mb-0">&copy; 2024 Walk Together. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>
