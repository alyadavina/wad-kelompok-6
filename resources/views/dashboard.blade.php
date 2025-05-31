<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f9f5f0;
        }
        .navbar {
            background-color: #800000;
        }
        .navbar-brand, .nav-link {
            color: #ffd700 !important;
        }
        .card {
            border: 1px solid #800000;
            border-radius: 10px;
        }
        .card-header {
            background-color: #800000;
            color: #fff;
        }
        .btn-maroon {
            background-color: #800000;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #a52a2a;
        }
        .text-maroon {
            color: #800000;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/dashboard">Telbea Beasiswa</a>
        <div class="ms-auto">
            <a href="/notifikasi" class="btn btn-outline-light btn-sm">Notifikasi</a>
            <a href="/favorite" class="btn btn-outline-light btn-sm">Favorite</a>
            <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('message'))
        <div class="alert alert-{{ session('status', 'success') }}">
            {{ session('message') }}
        </div>
    @endif
    <div class="row mb-4">
        <div class="col-md-8">
            <h4 class="text-dark">Selamat datang, <span class="text-maroon">{{ Auth::guard('mahasiswa')->user()->nama }}</span></h4>
            <p class="text-muted mb-0">Program Studi: {{ Auth::guard('mahasiswa')->user()->jurusan }}</p>
        </div>
    </div>

    <h2 class="text-center mb-4 text-maroon">Daftar Beasiswa Tersedia</h2>

    <div class="row">
        @forelse ($beasiswas as $beasiswa)
            <div class="col-md-4 mb-4 d-flex align-items-stretch">
                <div class="card shadow w-100">
                    @if(isset($beasiswa->gambar))
                        <img src="{{ asset('storage/beasiswa/' . $beasiswa->gambar) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $beasiswa->nama_beasiswa }}">
                    @else
                        <img src="{{ asset('img/default.jpg') }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Beasiswa">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h5 class="card-title mb-0">{{ $beasiswa->nama_beasiswa }}</h5>
                            <form action="{{ route('favorit.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">
                                <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent">
                                    @php
                                        $isFavorit = in_array($beasiswa->id, $mahasiswa->favoriteBeasiswas->pluck('beasiswa_id')->toArray());
                                    @endphp
                                    @if($isFavorit)
                                        <i class="fas fa-bookmark text-maroon"></i>
                                    @else
                                        <i class="far fa-bookmark text-muted"></i>
                                    @endif
                                </button>
                            </form>
                        </div>

                        <p class="card-text text-muted" style="font-size: 14px;">
                            {{ Str::limit($beasiswa->deskripsi, 100) }}
                        </p>
                        <ul class="list-unstyled small mb-3">
                            <li><strong>Kategori:</strong> {{ $beasiswa->kategori }}</li>
                            <li><strong>Penyelenggara:</strong> {{ $beasiswa->penyelenggara }}</li>
                            <li><strong>Tutup:</strong> {{ \Carbon\Carbon::parse($beasiswa->tanggal_tutup)->format('d M Y') }}</li>
                        </ul>                    
                        <a href="{{ $beasiswa->link_pendaftaran }}" class="btn btn-maroon mt-3" target="_blank">Daftar Sekarang</a>
                        </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center">Belum ada beasiswa tersedia saat ini.</div>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>
