<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Kelola Notifikasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6e6e6;
        }
        .navbar {
            background-color: maroon;
        }
        .btn-maroon {
            background-color: maroon;
            color: white;
        }
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
</nav>

<div class="container mt-4">
    <h2 class="mb-4">Kelola Notifikasi</h2>

    {{-- === FORM TAMBAH / EDIT === --}}
    <div class="card p-4 mb-4 bg-white">
        <h5>{{ isset($editData) ? 'Edit Notifikasi' : 'Tambah Notifikasi' }}</h5>
        <form action="{{ isset($editData) ? route('admin.notifikasi.update', $editData->id) : route('admin.notifikasi.store') }}" method="POST">
            @csrf
            @if(isset($editData))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $editData->judul ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Isi</label>
                <textarea name="isi" class="form-control" rows="3" required>{{ old('isi', $editData->isi ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Mahasiswa ID</label>
                <input type="number" name="mahasiswa_id" class="form-control" value="{{ old('mahasiswa_id', $editData->mahasiswa_id ?? '') }}" required>
            </div>
            <button type="submit" class="btn btn-maroon">
                {{ isset($editData) ? 'Simpan Perubahan' : 'Tambah' }}
            </button>
            @if(isset($editData))
                <a href="{{ route('admin.notifikasi.index') }}" class="btn btn-secondary">Batal</a>
            @endif
        </form>
    </div>

    {{-- === TABEL DATA NOTIFIKASI === --}}
    <table class="table table-bordered bg-white">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Mahasiswa ID</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notifikasi as $n)
            <tr>
                <td>{{ $n->id }}</td>
                <td>{{ $n->judul }}</td>
                <td>{{ $n->isi }}</td>
                <td>{{ $n->mahasiswa_id }}</td>
                <td>
                    <a href="{{ route('admin.notifikasi.index', ['edit' => $n->id]) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.notifikasi.destroy', $n->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus notifikasi ini?')" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>

