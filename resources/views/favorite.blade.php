<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa Favorit - Telkom University</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar-maroon {
            background-color: #800000;
        }

        .text-maroon {
            color: #800000;
        }

        .btn-outline-maroon {
            color: #800000;
            border-color: #800000;
        }

        .btn-outline-maroon:hover {
            background-color: #800000;
            color: white;
        }

        .card-border-maroon {
            border-left: 5px solid #800000;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-maroon navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/dashboard">Telbea Beasiswa</a>
        </div>
    </nav>

    <!-- Content -->
    <div class="container my-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-maroon">Beasiswa Favorit Kamu</h2>
            <p class="text-muted">Ini adalah beasiswa yang sudah kamu tandai sebagai favorit.</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($mahasiswa->favoriteBeasiswas as $favorit)
                    <div class="col">
                        <div class="card shadow-sm h-100 border-0 card-border-maroon">
                            <div class="card-body">
                                <h5 class="card-title text-maroon fw-semibold">{{ $favorit->beasiswa->nama }}</h5>
                                <p class="card-text text-secondary">
                                    {{ \Illuminate\Support\Str::limit($favorit->beasiswa->deskripsi, 100) }}
                                </p>
                                <a href="#" class="btn btn-outline-maroon btn-sm">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="text-center text-muted py-3 mt-5">
        &copy; {{ date('Y') }} Telkom University. All rights reserved.
    </footer>

</body>
</html>
