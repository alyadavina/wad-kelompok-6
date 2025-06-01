<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Telbea Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
        }
        .navbar {
            background-color: #800000; 
        }
        .navbar-brand, .nav-link, .text-white {
            color: white !important;
        }
        .sidebar {
            background-color: #d3d3d3; 
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar a {
            color: #800000;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background-color: #a52a2a; 
            color: white;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"> Telbea Admin Dashboard</a>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <a href="/admin/beasiswa">Atur Beasiswa</a>
                <a href="/admin/notifikasi">Kelola Notifikasi</a>
                <a href="/admin/listusers">Lihat Daftar Pengguna</a>
            </div>
            <div class="col-md-10 content">
                <h1 class="mb-4">Selamat Datang, Admin</h1>
                <p>Gunakan panel di kiri untuk mengelola Beasiswa.</p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
