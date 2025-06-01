<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Notifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar {
            background-color: #800000;
        }
        .btn-maroon {
            background-color: #800000;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #660000;
        }
        .table thead {
            background-color: #800000;
            color: white;
        }
        .card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #800000;
            color: white;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Telbea Admin - Notifikasi</a>
    </div>
</nav>

<div class="container my-5">
    <div class="card mb-4">
        <div class="card-header">
            Tambah Notifikasi
        </div>
        <div class="card-body">
            <form action="{{ route('admin.notifikasi.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="isi" class="form-label">Isi</label>
                        <input type="text" name="isi" id="isi" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="mahasiswa_id" class="form-label">Mahasiswa ID</label>
                        <input type="number" name="mahasiswa_id" id="mahasiswa_id" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-maroon">Tambah</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Daftar Notifikasi
        </div>
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Mahasiswa ID</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($notifikasis as $n)
                    <tr>
                        <td>{{ $n->id }}</td>
                        <td>{{ $n->judul }}</td>
                        <td>{{ $n->isi }}</td>
                        <td>{{ $n->mahasiswa_id }}</td>
                        <td>
                            <a href="{{ route('admin.notifikasi.edit', $n->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.notifikasi.destroy', $n->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin hapus notifikasi ini?')" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada notifikasi.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
