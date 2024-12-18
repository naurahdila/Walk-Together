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

  <!-- =======================================================
  * Template Name: QuickStart
  * Template URL: https://bootstrapmade.com/quickstart-bootstrap-startup-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
          <h1 data-aos="fade-up">Informasi Beasiswa <span>Sobat Wato!</span></h1>
          <p data-aos="fade-up" data-aos-delay="100">Raih Peluang Akademis dan Karirmu<br></p>
          <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
            <a href="#about" class="btn-get-started">Informasi Program</a>
            <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
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
   <!-- Info Section (Scholarship Options) -->
            <section id="info" class="info-section">
              <h2>Program Beasiswa Sobat Wato!</h2>
              <div class="container">
                <div class="card-container">
                  @foreach($products as $product)
                  <div class="card">
                    <img src="{{ asset('assets/img/gambar_beasiswa.jpg') }}" alt="{{ $product->name_product }}">
                    <div class="card-content">
                      <h4>{{ $product->name_product }}</h4>
                      <div style="text-align: left; padding: 10px; max-width: 600px; margin: 12px auto;">
                        <p style="font-size: 16px; color: #626262; line-height: 1.4; font-weight: 350;">
                          {{ $product->description ?? 'Deskripsi produk tidak tersedia.' }}</p>
                      </div>
                      <div class="card-footer">
                        <span class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                      </div>
                      <div style="margin-top: 12px; margin-bottom: 12px;">
                        <button class="buy-btn" onclick="showPopup('{{ $product->name_product }}', '{{ $product->price }}', '{{ $product->id }}')"> Daftar Sekarang</button>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
              </div>
            </section>

            <style>
            .card-container {
              display: flex; 
              flex-wrap: wrap; 
              justify-content: center;
              margin-bottom: 20px; 
            }

            .card {
              margin: 15px; 
              border: 1px solid #ccc; 
              border-radius: 8px; 
              overflow: hidden; 
              width: 300px;
              box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .card img {
              width: 100%; 
              height: auto;
            }

            .card-content {
              padding: 15px; 
            }
            </style>


      <!-- Popup Form -->
      <div id="popup" class="popup" style="display:none;">
        <div class="popup-content">
          <span class="close" onclick="closePopup()">&times;</span>
          <h3 id="popup-title"></h3>
          <div style="text-align: left; padding: 10px; max-width: 680px; margin: 12px auto;">
            <p style="font-size: 16px; color: #626262; line-height: 1.4; font-weight: 350;">
              Kelas Beasiswa adalah program yang dirancang untuk memberikan kesempatan belajar kepada mahasiswa atau individu yang berprestasi, namun membutuhkan dukungan finansial untuk melanjutkan pendidikan mereka. <br><br>
              Program ini memberikan pelatihan intensif untuk mempersiapkan penerima beasiswa agar dapat berhasil dalam seleksi dan memanfaatkan kesempatan beasiswa secara maksimal.
            </p>
          </div>
          <form action="{{ route('registration.store') }}" method="POST" class="registration-form">
            @csrf
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="phone">Telepon:</label>
            <input type="tel" id="phone" name="phone" required>
            <input type="hidden" id="product_id" name="product_id">
            <input type="hidden" id="product_name" name="product_name">
            <input type="hidden" id="product_price" name="product_price">
            <button type="submit">Kirim</button>
          </form>
        </div>
      </div>
</div>



</main>

<script>
   
   function showPopup(productName, productPrice, productId) {
    document.getElementById("popup-title").innerText = productName;
    document.getElementById("product_name").value = productName;
    document.getElementById("product_price").value = productPrice;
    document.getElementById("product_id").value = productId;

    document.getElementById("popup").style.display = "block";
}

    // Fungsi untuk menutup popup
    function closePopup() {
      document.getElementById("popup").style.display = "none";
    }

</script>

<style>

/* Popup Styles */
.popup {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 1000;
  justify-content: center;
  align-items: center;
  flex-direction: column;
}

.popup-content {
  background-color: white;
  padding: 30px;  /* Menambahkan padding untuk jarak dalam pop-up */
  border-radius: 10px;
  width: 90%;  /* Lebar 90% dari lebar layar */
  max-width: 800px;  /* Ukuran maksimum pop-up */
  position: relative;
}

/* Close Button */
.close {
  position: absolute;
  top: 10px;
  right: 15px;
  cursor: pointer;
  font-size: 20px;
}

/* Registration Form Styles */
.registration-form {
  margin: 10px 40px 20px; /* Mengatur margin */
}

.registration-form label {
  display: block;
  margin: 10px 0 5px;
}

.registration-form input {
  width: 100%;
  padding: 10px;  /* Menambahkan padding pada input untuk ruang lebih */
  margin-bottom: 15px;  /* Memberikan jarak antara input */
  border: 1px solid #ccc;
  border-radius: 4px;
}

.registration-form button {
  background-color: #007bff;
  color: white;
  padding: 12px;  /* Menambah padding pada tombol */
  border: none;
  border-radius: 5px;
  cursor: pointer;
  width: 100%;
}

.registration-form button:hover {
  background-color: #0056b3;
}

/* Card Styles */
.card-container {
  display: flex;
  flex-wrap: wrap; /* Allow cards to wrap to the next line */
  justify-content: center; /* Center the cards horizontally */
  margin-bottom: 20px; /* Space between card rows */
}

.card {
  margin: 15px; /* Space between cards */
  border: 1px solid #ccc; /* Add border */
  border-radius: 8px; /* Rounded corners */
  overflow: hidden; /* Prevent overflow */
  width: 300px; /* Set a fixed width for cards */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Add shadow */
}

.card img {
  width: 100%; /* Make image responsive */
  height: auto; /* Maintain aspect ratio */
}

.card-content {
  padding: 15px; /* Add padding */
}
</style>


  <script>

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

          
</main>
    
         



    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Walk Together</strong><span>All Rights Reserved</span></p>
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