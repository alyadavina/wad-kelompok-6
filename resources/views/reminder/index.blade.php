<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Reminder Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-dyv3a+9a3i5PZZVjHzQ0/+ISU4j3QrB0XOXoI1JUFdH6A2u9IN1dHqgy9TptwOjqD53cW5K5XEy4VhxDPxJ4ug==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f9f5f0;
            font-family: 'Segoe UI', sans-serif;
        }

        .bg-maroon {
            background-color: #800000 !important;
            color: #fff !important;
        }

        .text-maroon {
            color: #800000;
        }

        .badge-maroon {
            background-color: #800000;
            color: white;
            font-size: 0.85rem;
            padding: 6px 12px;
            border-radius: 12px;
        }

        .card-reminder {
            border: 1px solid #ddd;
            border-left: 5px solid #800000;
            border-radius: 10px;
            padding: 16px 20px;
            margin-bottom: 16px;
            background-color: #ffffff;
            transition: box-shadow 0.2s ease-in-out;
        }

        .card-reminder:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .reminder-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 4px;
        }

        .reminder-kategori {
            font-size: 0.9rem;
            color: #555;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-maroon shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="#">Sistem Beasiswa</a>
    </div>
</nav>

<div class="container mt-5 mb-4">
    <h3 class="mb-4 text-maroon text-center">Daftar Reminder Beasiswa</h3>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    @if($reminders->isEmpty())
        <div class="alert alert-warning text-center">Belum ada reminder yang kamu atur.</div>
    @else
        @foreach($reminders as $reminder)
            <div class="card-reminder d-flex justify-content-between align-items-center">
                <div>
                    <div class="reminder-title">{{ $reminder->beasiswa->nama_beasiswa }}</div>
                    <div class="reminder-kategori">Kategori: {{ $reminder->beasiswa->kategori }}</div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <span class="badge-maroon">
                        {{ \Carbon\Carbon::parse($reminder->waktu_pengingat)->format('d M Y H:i') }}
                    </span>

                    <form action="{{ route('reminder.destroy', $reminder->id) }}" method="POST" onsubmit="return confirm('Hapus reminder ini?')" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                            Hapus
                        </button>

                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>
</body>
</html>
