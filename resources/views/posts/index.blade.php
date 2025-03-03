<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Walk Together</title>

  <!-- Favicons -->
  <link href="{{ asset('assets/img/logo/walktogether.png') }}" rel="icon">
  <link href="{{ asset('assets/img/logo/walktogether.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Nunito:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a class="logo d-flex align-items-center me-auto">
          <img src="{{ asset('assets/img/logo/walktogether.png') }}" alt="">
          <h1 class="sitename">Walk Together</h1>
        </a>
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{ route('dashboard')}}" class="active">Home</a></li>
            <li><a href="#about">Informasi Program</a></li>
            <li><a href="#features">Tips & Trik</a></li>
            <li><a href="#class">Kelas</a></li>
            <li><a href="#komunitas">Komunitas</a></li>
            <li><a href="#contact">Contact</a></li>
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

    <!-- Create New Post Form -->
    <div class="container mt-5">
        <h1>Create New Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="SENDER">Sender</label>
                <input type="text" name="SENDER" id="SENDER" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="MESSAGE_TEXT">Message</label>
                <textarea name="MESSAGE_TEXT" id="MESSAGE_TEXT" class="form-control" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="MESSAGE_GAMBAR">Image</label>
                <input type="file" name="MESSAGE_GAMBAR" id="MESSAGE_GAMBAR" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Create Post</button>
        </form>
    </div>

    <!-- Social Media Posts Display -->
    <div class="container mt-5">
        <h1>Social Media Posts</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create Post</a>

        @if($posts->isEmpty())
            <p>No posts available.</p>
        @else
            @foreach ($posts as $post)
            <div class="card mt-3">
                <div class="card-body">
                    <h5>{{ $post->SENDER }}</h5>
                    <p>{{ $post->MESSAGE_TEXT }}</p>
                    @if ($post->MESSAGE_GAMBAR)
                        <img src="{{ asset('storage/' . $post->MESSAGE_GAMBAR) }}" alt="Image" class="img-fluid">
                    @endif
                    <small>{{ $post->CREATE_DATE }}</small>
                    <p>Likes: {{ $post->likes->count() }}</p>
                    <p>Comments: {{ $post->comments->count() }}</p>
                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">View Post</a>
                </div>
            </div>
            @endforeach
        @endif
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
