<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-8vNT58c2i+8Y8EfZFbWxO9Yz+SefmO/evJ6H9ABHgiRnMZr1WvjaQo0Y6VJY04nDdJ9b9kF2eD6UgZoYPJhDLg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        .card-body .d-flex {
            justify-content: space-between;
            align-items: center;
        }
        .card-body .d-flex i {
            font-size: 1.5rem;
            margin: 0 10px;
            cursor: pointer;
        }
        .card-body .d-flex button,
        .card-body .d-flex a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .modal-custom {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
        }

        .modal-custom:target {
            display: flex;
        }

        .modal-content-custom {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 90%;
            max-width: 400px;
            position: relative;
        }

        .close-btn {
            position: absolute;
            top: 10px; right: 15px;
            text-decoration: none;
            font-size: 1.5rem;
            color: #800000;
        }

        .card-link {
            display: block; 
        }

        .card-link:hover {
            cursor: pointer;
        }

        .card-link .card {
            transform 0.3s ease; 
        }

        .card-link:hover .card {
            transform: scale(1.05); 
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/dashboard">Telbea Beasiswa</a>
        <div class="ms-auto">
            <a href="/notifikasi" class="btn btn-outline-light btn-sm">Notifikasi</a>
            <a href="{{ route('reminder.index') }}" class="btn btn-outline-light btn-sm">Reminder</a>
            <a href="/favorite" class="btn btn-outline-light btn-sm">Favorite</a>
            <a href="/logout" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                <a href="{{ route('beasiswa.show', $beasiswa->id) }}" class="card-link text-decoration-none">
                    <div class="card shadow w-100">
                        @if(isset($beasiswa->gambar))
                            <img src="{{ asset('storage/beasiswa/' . $beasiswa->gambar) }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="{{ $beasiswa->nama_beasiswa }}">
                        @else
                            <img src="{{ asset('img/default.jpg') }}" class="card-img-top" style="height: 180px; object-fit: cover;" alt="Beasiswa">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="card-title mb-2">{{ $beasiswa->nama_beasiswa }}</h5>

                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    {{-- Komentar --}}
                                    <form action="{{ route('comments.show', $beasiswa->id) }}" method="GET" class="m-0">
                                        <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent text-muted" title="Komentar">
                                            <i class="far fa-comment"></i>
                                        </button>
                                    </form>

                                    {{-- Reminder --}}
                                    <a href="#reminder-{{ $beasiswa->id }}" class="btn btn-sm p-0 border-0 bg-transparent text-muted" title="Reminder">
                                        <i class="far fa-bell"></i>
                                    </a>

                                    {{-- Bookmark --}}
                                    <form action="{{ route('favorit.store') }}" method="POST" class="m-0">
                                        @csrf
                                        <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">
                                        <button type="submit" class="btn btn-sm p-0 border-0 bg-transparent" title="Bookmark">
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

                                {{-- Modall --}}
                                <div id="reminder-{{ $beasiswa->id }}" class="modal-custom">
                                    <div class="modal-content-custom">
                                        <a href="#" class="close-btn">&times;</a>
                                        <h5 class="mb-3">Atur Pengingat - {{ $beasiswa->nama_beasiswa }}</h5>
                                        <form action="{{ route('reminder.store') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">

                                            <div class="mb-2">
                                                <label for="waktu_reminder_{{ $beasiswa->id }}" class="form-label">Waktu Reminder</label>
                                                <select name="waktu_reminder" id="waktu_reminder_{{ $beasiswa->id }}" class="form-select" required>
                                                    <option value="">-- Pilih --</option>
                                                    <option value="1">1 hari sebelum</option>
                                                    <option value="2">2 hari sebelum</option>
                                                    <option value="custom">Custom</option>
                                                </select>
                                            </div>

                                            <div class="mb-2">
                                                <label for="custom_datetime_{{ $beasiswa->id }}" class="form-label">Waktu Custom</label>
                                                <input type="datetime-local" name="custom_datetime" id="custom_datetime_{{ $beasiswa->id }}" class="form-control">
                                            </div>

                                            <button type="submit" class="btn btn-maroon mt-2">Simpan</button>
                                        </form>
                                    </div>
                                </div>
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
