<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f5f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-maroon {
            background-color: #800000 !important;
            color: #fff !important;
        }

        .title-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin-top: 40px;
        }

        .title-container h1 {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .details-container {
            margin-top: 40px;
        }

        .action-buttons button {
            margin-left: 10px;
            transition: color 0.3s ease;
        }

        .navbar {
            padding: 0.5rem 1rem;
            background-color: #800000;
        }

        .navbar-brand, .nav-link {
            color: #ffffff;
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

        .row {
            display: flex;
            justify-content: space-between; 
            flex-wrap: wrap; 
        }

        .col {
            display: flex;
            align-items: center;
            margin-right: 20px; 
            margin-bottom: 10px; 
        }

        .col i {
            margin-right: 8px; 
        }

        .btn-maroon {
            background-color: #800000;
            color: #fff;
            font-weight: bold;
            border: none;
        }

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-maroon shadow-sm">
    <div class="container w-100">
        <a class="navbar-brand fw-bold" href="/dashboard">Sistem Beasiswa</a>
    </div>
</nav>

<div class="container">
    @if(session('message'))
        <div class="alert alert-{{ session('status', 'success') }} alert-dismissible fade show mt-2" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="title-container">
        <h1>{{ $beasiswa->nama_beasiswa }}</h1>
        <div class="action-buttons">
            {{-- Favorite --}}
            <form action="{{ route('favorit.store') }}" method="POST" class="d-inline">
                @csrf
                <input type="hidden" name="beasiswa_id" value="{{ $beasiswa->id }}">
                <button type="submit" class="btn btn-outline-danger btn-sm">
                    <i class="fas fa-bookmark"></i> Bookmark
                </button>
            </form>

            {{-- Reminder --}}
            <a href="#reminder-{{ $beasiswa->id }}" class="btn btn-outline-danger btn-sm">
                <i class="fas fa-bell"></i> Reminder
            </a>

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
                                <option value="">Pilih</option>
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
    </div>

    {{-- INI UNTUK TARO ICON --}}
    <div class="details-container">
        <div class="row">
            <div class="col-md-3">
                <i class="fas fa-graduation-cap"></i> Jenjang Pendidikan: S1
            </div>
            <div class="col-md-3">
                <i class="fas fa-calendar-alt"></i> Mulai Pendaftaran: 01 Jun 2025
            </div>
            <div class="col-md-3">
                <i class="fas fa-calendar-times"></i> Penutupan Pendaftaran: 15 Jul 2025
            </div>
            <div class="col-md-3">
                <i class="fas fa-university"></i> Penyelenggara: Telkom University
            </div>
        </div>
    </div>

    {{-- INI UNTUK GAMBAR --}}
    <div class="container mt-4">
        <img src="{{ asset('storage/beasiswa/' . $beasiswa->gambar) }}" alt="Gambar Beasiswa" class="img-fluid rounded shadow">
    </div>

    <div class="container mt-5">
        <h4 class="text-maroon fw-bold mb-3">Informasi Lengkap</h4>

        <div class="row">
            <div class="col-md-3 fw-semibold bg-light p-3 border-end rounded-start">
                Deskripsi
            </div>
            <div class="col-md-9 bg-light-subtle p-3 rounded-end">
                {{$beasiswa->deskripsi}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 fw-semibold bg-light p-3 border-end rounded-start">
                Persyaratan
            </div>
            <div class="col-md-9 bg-light-subtle p-3 rounded-end">
                {{$beasiswa->persyaratan}}
            </div>
        </div>
    </div>

    <div class="text-center my-4">
        <a href="{{ $beasiswa->link_pendaftaran }}" target="_blank" class="btn btn-maroon px-4 py-2 shadow">
            Daftar Sekarang
        </a>
    </div>
</div>

</body>
</html>
