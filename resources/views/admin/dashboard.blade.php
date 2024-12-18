<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8fcff;
            color: #333;
        }
        .header {
            background-color: #ffffff;
            padding: 10px 20px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar {
            height: 100vh;
            background-color: #e3f2fd;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            color: #333;
            padding: 10px 15px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s ease;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background-color: var(--accent-color);
            color: #fff;
        }
        .content {
            padding: 30px;
        }
        .card {
            border: none;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.03);
        }
        .card-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
        }
        .btn-logout {
            margin-top: 20px;
            text-align: center;
        }

        .btn-home {
            display: inline-block;
            background-color: #3b8dbf; /* Warna biru seperti contoh */
            color: #ffffff; /* Warna teks putih */
            border: none;
            border-radius: 50px; /* Membuat bentuk oval */
            padding: 8px 20px; /* Padding atas/bawah dan kiri/kanan */
            text-decoration: none; /* Menghilangkan garis bawah */
            font-weight: 600; /* Teks bold */
            font-size: 14px; /* Ukuran font */
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease; /* Animasi efek */
        }

        .btn-home:hover {
            background-color: #2c7ea2; /* Warna biru yang lebih gelap saat hover */
            transform: scale(1.05); /* Efek zoom saat di-hover */
            color: #ffffff; /* Warna teks tetap putih */
        }

    </style>
</head>
<body>

    <!-- Header -->
    <div class="header d-flex justify-content-between align-items-center">
        <h3 data-aos="fade-up">Dashboard Admin</h3>
        <a class="btn-home" href="/dashboard#home" >home</a>
    </div>

    <!-- Layout -->
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" >
            <h3 data-aos="fade-up"><span>Walk Together</span></h3>
            <a href="{{ route('admin.roles.index') }}"><i class="fas fa-user-tag me-2"></i> Manajemen Role</a>
            <a href="{{ route('admin.users.index') }}"><i class="fas fa-users me-2"></i> Manajemen User</a>
            <a href="#"><i class="fas fa-cog me-2"></i> Pengaturan</a>
        </div>

        <div class="container">
            @yield('content')
        </div>
        
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
