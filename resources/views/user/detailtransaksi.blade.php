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

  <script type="text/javascript"
		src="https://app.stg.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-TW96g4s0UugLddB1"></script>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="assets/img/logo/walktogether.png" alt="">
        <h1 class="sitename">Walk Together</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="index.html">Informasi Program</a></li>
          <li><a href="index.html">Tips & Trik</a></li>
          <li><a href="index.html#hero" class="active">Komunitas</a></li>
          <li class="dropdown"><a href="#"><span>Kelas</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Webinar</a></li>
              <li><a href="#">Mentoring</a></li>
            </ul>
          </li>
          <li><a href="index.html#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="/login">Daftar/Masuk</a>

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
            <a href="https://www.youtube.com/watch?v=Y 7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
          </div>
          <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
      </div>
    </section><!-- /Hero Section -->

    <section>

    <div class="container">
      <h1>Riwayat Transaksi</h1>
      
      @if($transactions->isEmpty())
    <p>Tidak ada transaksi yang ditemukan.</p>
@else
  
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>No</th>
                  <th>Jenis Transaksi</th>
                  <th>Nama Produk</th> <!-- Menampilkan nama produk -->
                  <th>Harga Produk</th> <!-- Menampilkan harga produk -->
                  <th>Nama</th>
                  <th>Tanggal</th>
                  <th>Status Pembayaran</th>
                  <th>Aksi</th>
              </tr>
          </thead>
          <tbody>
              @foreach($transactions as $index => $transaction)
            
                  <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $transaction->transaction_type }}</td>
                      <td>{{ $transaction->product_name }}</td> <!-- Menampilkan nama produk -->
                      <td>{{ $transaction->product_price }}</td> <!-- Menampilkan harga produk -->
                      <td>{{ $transaction->name }}</td>
                      <td>{{ $transaction->created_at }}</td>
                      {{-- <td>{{$transaction->price}}</td> --}}
                      <td>{{ $transaction->status_pembayaran }}</td>
                      <td>
                        @if($transaction->status_pembayaran === 'belum dibayar')
                        <form method="POST" action="#">
                          @csrf
                          <button type="button" class="btn btn-primary pay-button" data-id="{{ $transaction->id }}">Bayar</button>
                        </form>
                        
                    @else
                        <button class="btn btn-success" disabled>Sudah Dibayar</button>
                    @endif
                    

                          {{-- @if($transaction->status_pembayaran === 'belum dibayar')
                          <button type="button" class="btn btn-primary pay-button" >Bayar</button>
                      @else
                          <button class="btn btn-success" disabled>Sudah Dibayar</button>
                      @endif --}}

                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
      @endif
  </div> </section><!-- /Checkout History Section -->

    <!-- Payment Detail Section -->
    <section id="payment-detail" class="payment-detail section">
      <div class="container">
        <h2>Detail Pembayaran</h2>
        <div class="payment-info">
          <p><strong>Nama Kelas:</strong> Webinar Beasiswa</p>
          <p><strong>Tanggal Pembayaran:</strong> 01-01-2024</p>
          <p><strong>Jumlah Pembayaran:</strong> Rp 0</p>
          <p><strong>Status Pembayaran:</strong> Selesai</p>
          <button class="btn btn-success">Checkout</button>
        </div>
      </div>
    </section><!-- /Payment Detail Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Walk Together</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
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
        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
          </form>
        </div>
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>


  </main>

  <footer id="footer" class="footer position-relative light-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Walk Together</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
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
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src=" assets/vendor/aos/aos.js"></script>
  <script src="assets/js/main.js"></script>

 <!-- Tambahkan Script Midtrans Snap -->
{{-- <script type="text/javascript" ></script> --}}
{{-- <script>
    // Tombol Bayar
    const payButton = document.getElementById('pay-button');

    payButton.addEventListener('click', function() {
        fetch("{{ route('transaction.pay', $transaction->id) }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.snapToken) {
                // Panggil Midtrans Snap Popup
                snap.pay(data.snapToken, {
                    onSuccess: function(result) {
                        console.log("Pembayaran berhasil:", result);
                        alert("Pembayaran berhasil!");
                        location.reload();
                    },
                    onPending: function(result) {
                        console.log("Pembayaran tertunda:", result);
                        alert("Pembayaran tertunda!");
                        location.reload();
                    },
                    onError: function(result) {
                        console.log("Pembayaran gagal:", result);
                        alert("Pembayaran gagal. Silakan coba lagi.");
                    },
                    onClose: function() {
                        alert("Anda menutup pembayaran sebelum selesai.");
                    }
                });
            } else {
                console.error("Snap Token tidak ditemukan:", data);
                alert("Terjadi kesalahan. Coba lagi.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan. Coba lagi.");
        });
    });
</script> --}}


<script type="text/javascript">
  // Event listener untuk tombol Bayar
  document.querySelectorAll('.pay-button').forEach(button => {
    button.addEventListener('click', function() {
        const transactionId = this.getAttribute('data-id');

        // Kirim request ke server untuk mendapatkan Snap Token
        fetch("{{ url('/transaction/pay') }}/" + transactionId, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.snapToken) {
                // Panggil Midtrans Snap Modal
                snap.pay(data.snapToken, {
                    onSuccess: function(result) {
                        console.log("Pembayaran berhasil:", result);
                        alert("Pembayaran berhasil!");
                        location.reload(); // Memuat ulang halaman untuk memperbarui status transaksi
                    },
                    onPending: function(result) {
                        console.log("Pembayaran tertunda:", result);
                        alert("Pembayaran tertunda!");
                        location.reload();
                    },
                    onError: function(result) {
                        console.log("Pembayaran gagal:", result);
                        alert("Pembayaran gagal. Silakan coba lagi.");
                    },
                    onClose: function() {
                        alert("Anda menutup pembayaran sebelum selesai.");
                    }
                });
            } else {
                alert("Snap Token tidak ditemukan. Silakan coba lagi.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Terjadi kesalahan. Silakan coba lagi.");
        });
    });
});

</script>





</body>
</html>