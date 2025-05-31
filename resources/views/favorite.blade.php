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
        .pill-group {
    display: flex;
    gap: 8px;
    margin-top: 8px;
    flex-wrap: wrap;
}

.pill-prio {
    border: 2px solid currentColor;
    background-color: transparent;
    padding: 6px 16px;
    border-radius: 50px;
    font-size: 0.8rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    min-width: 80px;
    text-align: center;
}

/* Warna per prioritas */
.pill-tinggi {
    color: #b30000;
}
.pill-sedang {
    color: #cc7a00;
}
.pill-rendah {
    color: #007c91;
}
.pill-tinggi.active {
    background-color: #b30000;
    color: #fff;
}
.pill-sedang.active {
    background-color: #cc7a00;
    color: #fff;
}
.pill-rendah.active {
    background-color: #007c91;
    color: #fff;
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

        @if(session('message'))
            <div class="alert alert-{{ session('status', 'success') }} alert-dismissible fade show mt-2" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
                                <p class="mb-2">
                                    @php
                                        $badgeClass = match($favorit->prioritas) {
                                            'Tinggi' => 'pill pill-tinggi',
                                            'Sedang' => 'pill pill-sedang',
                                            'Rendah' => 'pill pill-rendah',
                                            default => 'pill',
                                            };
                                    @endphp
                                    <span class="{{ $badgeClass }}">{{ $favorit->prioritas }}</span>
                                </p>
                                <form action="{{ route('favorit.update', $favorit->beasiswa->id) }}" method="POST" class="d-flex gap-2 flex-wrap">
    @csrf
    @method('PUT')
    @foreach (['Tinggi', 'Sedang', 'Rendah'] as $prio)
        <button type="submit" name="prioritas" value="{{ $prio }}"
            class="pill-prio {{
                $prio === 'Tinggi' ? 'pill-tinggi' :
                ($prio === 'Sedang' ? 'pill-sedang' : 'pill-rendah')
            }} {{ $favorit->prioritas === $prio ? 'active' : '' }}">
            {{ $prio }}
        </button>
    @endforeach
</form>



                            </div>
                        </div>
                    </div>
                @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center text-muted py-3 mt-5">
        &copy; {{ date('Y') }} Telkom University. All rights reserved.
    </footer>

</body>
</html>
