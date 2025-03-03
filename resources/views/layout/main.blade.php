<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Walk Together</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo/walktogether.png')}}" rel="icon">
  <link href="{{ asset('assets/img/logo/walktogether.png')}}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="{{ asset('https://fonts.googleapis.com')}}" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
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
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#about">Informasi Program</a></li>
          <li><a href="#features">Tips & Trik</a></li>
          <li><a href="#class">Kelas</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
      <a class="btn-getstarted" href="{{ route('login') }}">
        @guest
            Daftar/Masuk
        @endguest
    
        @auth
            Logout
        @endauth
    </a>
    
      @if(Auth::check() && Auth::user()->role_id === 1)
      <a class="btn-getstarted" href="{{ route('admin.dashboard') }}">Admin</a>
      @endif

    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="home" class="hero section">
      <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp">
      </div>
      <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
          <h1 data-aos="fade-up">Welcome to <span>Walk Together</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Raih Peluang Akademis dan Karirmu<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Informasi Program</a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
          <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </section>

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
                <h4 class="title"><a  class="stretched-link">Kesuksesan</a></h4>
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

    <!-- Program Section -->
    <section id="about" class="section informasi-program">
      <div class="container">
        <div class="row text-center">
          <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
          <div style="display: flex; justify-content: space-around; flex-wrap: wrap; background-color: #f8fcff; padding: 40px; gap: 20px;">
              <!-- Beasiswa -->
              <div style="background-color: #ffffff; border-radius: 8px; text-align: center; width: 220px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; padding: 20px;">
                <div style="background-color: #e3f2fd; border-radius: 8px; padding: 10px; margin-bottom: 15px; display: inline-block;">
                  <span style="font-size: 30px; color: var(--accent-color);"><i class="bi bi-mortarboard"></i></span>
                </div>
                <h4 style="color: #333; margin: 10px 0;">Beasiswa</h4>
                <p style="color: #555; font-size: 0.9rem;">Informasi tentang program beasiswa terbaru.</p>
                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 15px;">
                </div>
              </div>
            
              <!-- Magang -->
              <div style="background-color: #ffffff; border-radius: 8px; text-align: center; width: 220px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; padding: 20px;">
                <div style="background-color: #e3f2fd; border-radius: 8px; padding: 10px; margin-bottom: 15px; display: inline-block;">
                  <span style="font-size: 30px; color: var(--accent-color);"><i class="bi bi-briefcase-fill"></i></span>
                </div>
                <h4 style="color: #333; margin: 10px 0;">Magang</h4>
                <p style="color: #555; font-size: 0.9rem;">Peluang magang nasional dan internasional.</p>
                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 15px;">
                </div>
              </div>
            
              <!-- IISMA -->
              <div style="background-color: #ffffff; border-radius: 8px; text-align: center; width: 220px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; padding: 20px;">
                <div style="background-color: #e3f2fd; border-radius: 8px; padding: 10px; margin-bottom: 15px; display: inline-block;">
                  <span style="font-size: 30px; color: var(--accent-color);"><i class="bi bi-globe2"></i></span>
                </div>
                <h4 style="color: #333; margin: 10px 0;">IISMA</h4>
                <p style="color: #555; font-size: 0.9rem;">Program pertukaran mahasiswa internasional.</p>
                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 15px;">

                </div>
              </div>
            
              <!-- Akademis -->
              <div style="background-color: #ffffff; border-radius: 8px; text-align: center; width: 220px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); transition: transform 0.3s ease; padding: 20px;">
                <div style="background-color: #e3f2fd; border-radius: 8px; padding: 10px; margin-bottom: 15px; display: inline-block;">
                  <span style="font-size: 30px; color: var(--accent-color);"><i class="bi bi-book"></i></span>
                </div>
                <h4 style="color: #333; margin: 10px 0;">Akademis</h4>
                <p style="color: #555; font-size: 0.9rem;">Informasi akademis untuk perkembangan karir Anda.</p>
                <div style="display: flex; justify-content: center; gap: 10px; margin-top: 15px;">
                  
                </div>
              </div>
              </div>
            </div>
        </div>
      </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tips & Trik</h2>
        <p>Simak tips dan trik dibawah ini untuk menjadi sobat wato yang penuh persiapan</p>
      </div>

      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center">
            <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
              <li class="nav-item">
                <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                  <i class="bi bi-binoculars"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Pendaftaran Beasiswa</h4>
                    <p>
                      Mulailah dengan mencari informasi beasiswa yang sesuai. 
                      Pastikan kamu memenuhi syarat administratif seperti transkrip nilai, surat rekomendasi, dan esai motivasi. 
                      Jangan lupa untuk selalu periksa tenggat waktu agar Anda tidak melewatkan kesempatan emas.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                  <i class="bi bi-box-seam"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Persiapan Karier</h4>
                    <p>
                      Persiapan karier dimulai dengan membangun CV dan portofolio yang kuat. Highlight keahlian dan pengalaman yang relevan dengan posisi yang kamu lamar. 
                      Ingat, konsistensi dan kemauan belajar adalah kunci sukses.
                    </p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                  <i class="bi bi-brightness-high"></i>
                  <div>
                    <h4 class="d-none d-lg-block">Pengembangan Diri</h4>
                    <p>
                      Pengembangan diri adalah proses untuk mencapai versi terbaik dari diri Anda. Mulailah dengan mengenali kelebihan dan kekurangan, lalu buat 
                      target spesifik yang ingin dicapai. Percayalah, setiap langkah kecil 
                      akan membawa perubahan besar di masa depan.
                    </p>
                  </div>
                </a>
              </li>
            </ul><!-- End Tab Nav -->
          </div>

          <div class="col-lg-6">
            <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
              <div class="tab-pane fade active show" id="features-tab-1">
                <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
              <div class="tab-pane fade" id="features-tab-2">
                <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
              <div class="tab-pane fade" id="features-tab-3">
                <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
              </div><!-- End Tab Content Item -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="class" class="services section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Kelas Walk Together</h2>
        <p>Kelas dan Mentoring untuk mengasah masa depan</p>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item item-cyan position-relative">
              <i class="bi bi-activity icon"></i>
              <div>
                <h3>Kelas Bimbingan Beasiswa</h3>
                <p>Siapkan dirimu untuk meraih beasiswa impian!</p>
                <a href="{{ route('detail_beasiswa') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item item-orange position-relative">
              <i class="bi bi-broadcast icon"></i>
              <div>
                <h3>Kelas Bimbingan Magang MSIB</h3>
                <p>Raih peluang magang nasional dan internasional melalui program MSIB!</p>
                <a href="{{ route('detail_magang') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item item-teal position-relative">
              <i class="bi bi-easel icon"></i>
              <div>
                <h3>Mentoring Lomba Essay dan KTI</h3>
                <p>Asah kemampuan menulismu dan raih prestasi di berbagai lomba esai dan karya tulis ilmiah!</p>
                <a href="{{ route('detail_lomba') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item item-red position-relative">
              <i class="bi bi-bounding-box-circles icon"></i>
              <div>
                <h3>Mentoring Mahasiswa Berprestasi</h3>
                <p>Bersiaplah menjadi mahasiswa berprestasi!</p>
                <a href="{{ route('detail_mapres') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item item-indigo position-relative">
              <i class="bi bi-calendar4-week icon"></i>
              <div>
                <h3>Kelas Freshgraduate Persiapan Karir</h3>
                <p>Bagi fresh graduate, memulai karier bisa menjadi tantangan.</p>
                <a href="{{ route('detail_freshgraduate') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item item-pink position-relative">
              <i class="bi bi-chat-square-text icon"></i>
              <div>
                <h3>Kelas Bimbingan Kewirausahaan</h3>
                <p>Merancang rencana bisnis yang matang, dan strategi untuk memulai bisnis dengan langkah yang tepat dan berkelanjutan.</p>
                <a href="{{ route('detail_kewirausahaan') }}" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div><!-- End Service Item -->
        </div>
      </div>
    </section><!-- /Services Section -->
    
    {{-- <!-- Pricing Section -->
    <section id="komunitas" class="pricing section">
      <div class="container">
        <div class="container section-title" data-aos="fade-up">
          <h2>Komunitas</h2>
        </div>
      <section id="features-details" class="features-details section">
      <div class="row gy-4 justify-content-between features-item">
        <div class="col-lg-5 d-flex align-items-center order-2 order-lg-1" data-aos="fade-up" data-aos-delay="100">
          <div class="content">
            <h3>Bergabung dengan Komunitas Sosial !</h3>
            <p>
              Ingin berbagi pengalaman, berdiskusi, dan berinteraksi dengan sesama pejuang beasiswa dan pengembangan karier?
            </p>
            <p>Nikmati suasana belajar yang suportif, dapatkan update informasi terbaru, dan jalin relasi dengan teman-teman yang memiliki tujuan serupa."</p>
            <a href="/posts" class="btn more-btn">Gabung Sekarang</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="200">
          <img src="assets/img/features-2.jpg" class="img-fluid" alt="">
        </div>
      </div>
  </section><!-- /Pricing Section --> --}}

<!-- artikel section -->

<section id="articles" class="articles section light-background">
    <div class="container">
        <div class="section-title text-center" data-aos="fade-up">
            <h2>Artikel Terbaru</h2>
            <p>Temukan artikel-artikel terbaru yang dapat membantu perjalanan akademik dan karirmu!</p>
        </div>

        <!-- Single Full-Width Horizontal Card -->
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12">
                <div class="card custom-full-card">
                    <div class="row no-gutters">
                        <div class="col-lg-7">
                            <img src="{{ asset('assets/img/gambar_beasiswa.jpg') }}" class="card-img" alt="Artikel 1">
                        </div>
                        <div class="col-lg-5">
                            <div class="card-body">
                                <h5 class="card-title">Panduan Beasiswa 2024</h5>
                                <p class="card-text">Dapatkan panduan lengkap mengenai cara mendaftar beasiswa 2024, termasuk tips dan trik untuk mempersiapkan dokumen-dokumen yang dibutuhkan.</p>
                                <a href="/articles" class="btn btn-primary">Baca Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button to view all articles -->
        <div class="text-center" data-aos="fade-up" data-aos-delay="200">
            <a href="/articles" class="btn btn-secondary">Lihat Semua Artikel</a>
        </div>
    </div>
</section>

<!-- Optional Custom Styles -->
<style>
    .custom-full-card {
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        margin-bottom: 30px;
        width: 100%; /* Full width of the container */
        height: 400px; 
    }

    .custom-full-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .custom-full-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 20px;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: bold;
        color: #333;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border-radius: 25px;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
        text-transform: uppercase;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #f8f9fa;
        color: #007bff;
        border-radius: 25px;
        padding: 10px 20px;
        transition: background-color 0.3s ease;
    }

    .btn-secondary:hover {
        background-color: #e2e6ea;
    }
</style>




    <!-- Faq Section -->
    <section id="faq" class="faq section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pertanyaan yang Sering Muncul</h2>
      </div><!-- End Section Title -->
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">
            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3>Bagaimana cara menemukan program beasiswa yang tepat?</h3>
                <div class="faq-content">
                  <p>Anda dapat mencari program beasiswa melalui situs resmi penyedia beasiswa, portal pendidikan, atau bertanya pada komunitas. Pastikan Anda memahami syarat dan kriteria beasiswa serta menyiapkan dokumen penting seperti transkrip nilai, esai motivasi, dan surat rekomendasi.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Dokumen apa saja yang harus dipersiapkan untuk mendaftar beasiswa?</h3>
                <div class="faq-content">
                  <p>Dokumen umum yang perlu dipersiapkan antara lain: Transkrip nilai, Surat rekomendasi, Esai motivasi, Sertifikat prestasi atau kegiatan pendukung, Selalu periksa persyaratan resmi dari penyedia beasiswa.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa tips sukses dalam melamar pekerjaan pertama?</h3>
                <div class="faq-content">
                  <p>Beberapa tips sukses melamar pekerjaan pertama:
                    Buat CV yang jelas, singkat, dan relevan, 
                    Cantumkan pengalaman organisasi, magang, atau proyek,
                    Latih keterampilan wawancara dengan teman atau mentor,
                    Pelajari profil perusahaan sebelum melamar,
                    Tunjukkan semangat belajar dan keterbukaan untuk berkembang.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Bagaimana cara mempersiapkan diri menghadapi wawancara beasiswa?</h3>
                <div class="faq-content">
                  <p>Persiapan wawancara beasiswa meliputi:
                    Memahami program beasiswa dan penyedia,
                    Mempelajari esai atau formulir pendaftaran Anda,
                    Berlatih menjawab pertanyaan umum seperti motivasi dan tujuan,
                    Berlatih berbicara dengan jelas, percaya diri, dan sopan,
                    Berpakaian rapi dan profesional saat wawancara.
                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Apa pentingnya magang dalam persiapan karier?</h3>
                <div class="faq-content">
                  <p>Magang membantu Anda mendapatkan **pengalaman dunia kerja**, memahami cara kerja industri, dan membangun jaringan profesional. Selain itu, magang meningkatkan peluang Anda untuk mendapatkan pekerjaan karena perekrut lebih menyukai kandidat dengan pengalaman kerja.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
            </div>
          </div><!-- End Faq Column-->
        </div>
      </div>
    </section><!-- /Faq Section -->

    <section id="testimonials" class="testimonials section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimoni Program</h2>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Setelah mengikuti tips persiapan karier dan membangun portofolio dengan baik, saya akhirnya diterima di perusahaan impian. Kepercayaan diri saya meningkat, dan saya yakin bahwa setiap usaha yang dilakukan dengan sungguh-sungguh akan membuahkan hasil."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Manager</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Mendapatkan beasiswa ini adalah salah satu pencapaian terbesar dalam hidup saya. Prosesnya memang menantang, tetapi melalui dukungan mentor dan persiapan yang matang, akhirnya saya bisa lolos. Terima kasih kepada pihak yang telah memberikan kesempatan ini!"
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Mahasiswa Unair</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Mengikuti program magang benar-benar membuka mata saya tentang dunia kerja. Mulai dari keterampilan teknis hingga bagaimana beradaptasi dengan lingkungan profesional. Magang ini tidak hanya menambah pengalaman, tetapi juga membuka peluang untuk saya bekerja di perusahaan yang sama setelah lulus. Pengalaman berharga yang tidak akan saya lupakan!"
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Magang Apple Academy</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Tidak mudah menemukan program beasiswa yang tepat, tetapi dengan panduan yang diberikan, saya berhasil mendaftar dan diterima! Beasiswa ini memberi saya kesempatan untuk fokus pada studi tanpa terbebani masalah finansial."
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Mahasiswa IT</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  "Berkat tips dan panduan yang saya dapatkan, saya berhasil membuat CV menarik dan tampil percaya diri saat wawancara. Sekarang, saya bekerja di perusahaan impian saya. Jangan pernah ragu untuk belajar dan mencoba, peluang ada untuk semua orang yang berusaha!"
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section><!-- /Testimonials Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt"></i>
              <h3>Alamat</h3>
              <p>Jl. Airlangga No.4 - 6, Airlangga, Kec. Gubeng, Surabaya, Jawa Timur 60115</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone"></i>
              <h3>Telepon</h3>
              <p>+62 812 3456 7800</p>
            </div>
          </div><!-- End Info Item -->

          <div class="col-lg-3 col-md-6">
            <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p>walktogether@gmail.com</p>
            </div>
          </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.149421457475!2d110.37842651516983!3d-7.555774494545179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a140f9c2c97a1%3A0x63e4b8e34ed8f77e!2sUniversitas%20Sebelas%20Maret!5e0!3m2!1sid!2sid!4v1714030202342!5m2!1sid!2sid" 
            frameborder="0" 
            style="border:0; width: 100%; height: 400px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>
          

          </div><!-- End Google Maps -->

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div><!-- End Contact Form -->
        </div>
      </div>
    </section><!-- /Contact Section -->
  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a  class="logo d-flex align-items-center">
            <span class="sitename">Walk Together</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Walk Together</p>
            <p>Surabaya, Jawa Timur</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+62 812 3456 7800</span></p>
            <p><strong>Email:</strong> <span>walktogether@gmail.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Walk Together</strong><span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

   




</body>
</html>