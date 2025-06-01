<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Sistem Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --maroon: #800000;
            --gray-soft: #f0f0f0;
            --dark-gray: #333;
        }

        body {
            background: linear-gradient(to bottom right, var(--maroon), var(--gray-soft));
            font-family: 'Segoe UI', sans-serif;
            color: var(--dark-gray);
        }

        .navbar {
            background-color: var(--maroon);
        }

        .navbar-brand,
        .nav-link,
        .footer {
            color: #fff !important;
        }

        .hero {
            padding: 100px 0;
            text-align: center;
            color: white;
            background: linear-gradient(45deg, #800000, #b22222);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.25rem;
        }

        .section-info {
            background-color: var(--gray-soft);
            padding: 60px 0;
        }

        .info-card {
            background-color: #ffffff;
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .btn-login {
            background-color: var(--maroon);
            color: white;
            padding: 12px 30px;
            font-size: 1.1rem;
            border-radius: 8px;
            transition: 0.3s;
        }

        .btn-login:hover {
            background-color: #a00000;
            transform: scale(1.05);
        }

        .footer {
            background-color: #2c2c2c;
            padding: 20px 0;
            color: #aaa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">TelBea Beasiswa</a>
            <div class="collapse navbar-collapse">
            </div>
        </div>
    </nav>
    <section class="hero">
        <div class="container">
            <h1>Selamat Datang pada layanan Telbea Beasiswa</h1>
            <p class="mt-3">Maju Bersama Prestasimu.</p>
            <a href="{{ route('login') }}" class="btn btn-login mt-4">Mulai Sekarang</a>
        </div>
    </section>
    <section class="section-info" id="fitur">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Kenapasih kamu harus memilih Telbea?</h2>
                <p class="text-muted">Kami menyediakan informasi beasiswa terbaik bagi mahasiswa Telkom University .</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card info-card p-4 h-100">
                        <h5 class="fw-bold">Beasiswa Terbaik</h5>
                        <p>Beasiswa terbaik yang ada di seluruh Indonesia untuk Mahasiswa Telkom University.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card p-4 h-100">
                        <h5 class="fw-bold">Aman & Terkelola</h5>
                        <p>Telbea berkomitmen untuk menjaga data kamu dengan aman dan terkelola dengan baik.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-card p-4 h-100">
                        <h5 class="fw-bold">User Friendly</h5>
                        <p>Telbea menyediakan interface yang user-friendly dan responsif di berbagai perangkat.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer mt-5">
        <div class="container text-center">
            <p>© {{ date('Y') }} Telbea, Kelompok 6.</p>
        </div>
    </footer>

</body>
</html>
