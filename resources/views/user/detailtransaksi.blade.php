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
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

  <!-- Midtrans Snap JS -->
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-TW96g4s0UugLddB1"></script>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('assets/img/logo/walktogether.png') }}" alt="Logo">
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

    <section class="container mt-5">
      <h1>Riwayat Transaksi</h1>
      
      @if($transactions->isEmpty())
        <p>Tidak ada transaksi yang ditemukan.</p>
      @else
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>No</th>
              <th>Jenis Transaksi</th>
              <th>Nama Produk</th>
              <th>Harga Produk</th>
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
                <td>{{ $transaction->product_name }}</td>
                <td>{{ $transaction->product_price }}</td>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->created_at }}</td>
                <td>{{ $transaction->status_pembayaran }}</td>
                <td>
                  @if($transaction->status_pembayaran === "belum dibayar")
                    <button type="button" class="btn btn-primary pay-button" data-transaction-id="{{ $transaction->id }}">Bayar</button>
                  @else
                    <button class="btn btn-success" disabled>Sudah Dibayar</button>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </section>

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
      </div>
    </div>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/js/main.js') }}"></script>

  <script>
    document.querySelectorAll('.pay-button').forEach(button => {
      button.addEventListener('click', function () {
        const transactionId = this.getAttribute('data-transaction-id');

        fetch(`/transaction/pay/${transactionId}`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
          }
        })
          .then(response => response.json())
          .then(data => {
            if (data.snapToken) {
              snap.pay(data.snapToken, {
                onSuccess: result => {
                  alert('Pembayaran berhasil!');
                  location.reload();
                },
                onPending: result => {
                  alert('Pembayaran tertunda!');
                },
                onError: result => {
                  alert('Pembayaran gagal!');
                },
                onClose: () => {
                  alert('Transaksi dibatalkan.');
                }
              });
            } else {
              alert('Snap Token tidak ditemukan.');
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan.');
          });
      });
    });
  </script>

</body>

</html>
