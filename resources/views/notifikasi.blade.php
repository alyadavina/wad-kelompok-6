<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .notif-box {
            border-left: 5px solid maroon;
            background-color: #f0f0f0;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .notif-title {
            color: maroon;
            font-weight: bold;
        }
        .btn-maroon {
            background-color: maroon;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #800000;
            color: white;
        }
    </style>
</head>
<body>

<div class="container py-5">

    <h2 class="mb-4 text-center text-maroon">Daftar Notifikasi</h2>
    

    @foreach ($notifikasi as $n)
        <div class="notif-box shadow-sm">
            <div class="notif-title">{{ $n->judul }}</div>
            <p>{{ $n->isi }}</p>

            @if (!$n->is_read)
                <form action="{{ url('/notifikasi/'.$n->id.'/read') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-maroon">Tandai Sudah Dibaca</button>
                </form>
            @else
                <span class="badge bg-secondary">Sudah dibaca</span>
            @endif
        </div>
    @endforeach

    @if (count($notifikasi) === 0)
        <div class="alert alert-info text-center">Belum ada notifikasi.</div>
    @endif
</div>

</body>
</html>