<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

        <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>


    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f9ff;
            color: #333;
        }
        .navbar {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        .navbar-nav .nav-link {
            color: #fff;
            font-size: 1rem;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #d4e9ff;
        }
        .sidebar {
            height: 100vh;
            background: linear-gradient(180deg, #4facfe, #00f2fe);
            padding: 20px;
            position: fixed;
            width: 260px;
            overflow-y: auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 20px;
            color: #ffffff;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            color: #fff;
            padding: 12px 20px;
            margin-bottom: 12px;
            text-decoration: none;
            border-radius: 12px;
            transition: background 0.3s ease, transform 0.2s ease;
            font-weight: 500;
        }
        .sidebar a i {
            margin-right: 10px;
            font-size: 1.3rem;
            color: #d4e9ff;
        }
        .sidebar a.active,
        .sidebar a:hover {
            background: #0056b3;
            color: #fff;
            transform: translateX(8px);
        }
        .content {
            margin-left: 280px;
            padding: 40px;
            min-height: 100vh;
            background-color: #f4f9ff;
            box-shadow: inset 0px 4px 10px rgba(0, 0, 0, 0.05);
        }
        .card {
            border: none;
            border-radius: 12px;
            background-color: #ffffff;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }
        .btn-logout {
            text-align: center;
            margin-top: 30px;
        }
        .btn-logout a {
            background: linear-gradient(90deg, #ff6b6b, #ff4c4c);
            color: #fff;
            padding: 12px 30px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        .btn-logout a:hover {
            background: linear-gradient(90deg, #ff4c4c, #ff2e2e);
            transform: scale(1.1);
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            font-size: 0.9rem;
            color: #777;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/dashboard#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Walk Together</h4>
        <a href="{{ route('admin.roles.index') }}"><i class="fas fa-user-tag"></i> Manajemen Role</a>
        <a href="{{ route('admin.users.index') }}" ><i class="fas fa-users"></i> Manajemen User</a>
        <a href="{{ route('admin.articles.index') }}"><i class="fas fa-newspaper"></i> Posting Artikel</a>
        <a href="{{ route('admin.transaction_history.index') }}"><i class="fas fa-history"></i> Riwayat Transaksi</a>
        <a href="#"><i class="fas fa-cog"></i> Pengaturan</a>
        <div class="btn-logout">
            <a href="/login"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        @yield('content')
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; 2024 Walk Together - All Rights Reserved.
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
