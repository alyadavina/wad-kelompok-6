<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Beasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .navbar, .bg-maroon {
            background-color: #800000;
        }
        .text-maroon {
            color: #800000;
        }
        .btn-maroon {
            background-color: #800000;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #660000;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <h2 class="text-center text-white p-3 rounded bg-maroon">Kelola Beasiswa</h2>
    <div class="card mt-4 shadow">
        <div class="card-header bg-maroon text-white">Tambah Beasiswa</div>
        <div class="card-body">
            <form action="{{ route('admin.beasiswa.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Beasiswa</label>
                        <input type="text" name="nama_beasiswa" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Kategori</label>
                        <select name="kategori" class="form-control" required>
                            <option value="Tel-U">Tel-U</option>
                            <option value="Nasional">Nasional</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Penyelenggara</label>
                        <input type="text" name="penyelenggara" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Jenjang Pendidikan</label>
                        <input type="text" name="jenjang_pendidikan" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Buka</label>
                        <input type="date" name="tanggal_buka" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Tutup</label>
                        <input type="date" name="tanggal_tutup" class="form-control" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Link Pendaftaran</label>
                        <input type="url" name="link_pendaftaran" class="form-control" required>
                    </div>
                    <div class="col-12 d-grid mt-3">
                        <button type="submit" class="btn btn-maroon">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card mt-5 shadow">
        <div class="card-header bg-secondary text-white">Daftar Beasiswa</div>
        <div class="card-body table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Penyelenggara</th>
                        <th>Jenjang</th>
                        <th>Buka</th>
                        <th>Tutup</th>
                        <th>Link</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beasiswas as $beasiswa)
                        <tr>
                            <td>{{ $beasiswa->id }}</td>
                            <td>{{ $beasiswa->nama_beasiswa }}</td>
                            <td>{{ $beasiswa->kategori }}</td>
                            <td>{{ $beasiswa->penyelenggara }}</td>
                            <td>{{ $beasiswa->jenjang_pendidikan }}</td>
                            <td>{{ $beasiswa->tanggal_buka }}</td>
                            <td>{{ $beasiswa->tanggal_tutup }}</td>
                            <td><a href="{{ $beasiswa->link_pendaftaran }}" target="_blank">Link</a></td>
                            <td>
                                {{-- Edit Form --}}
                                <form action="{{ route('admin.beasiswa.update', $beasiswa->id) }}" method="POST" class="mb-2">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nama_beasiswa" value="{{ $beasiswa->nama_beasiswa }}" class="form-control mb-1" required>
                                    <textarea name="deskripsi" class="form-control mb-1" rows="2" required>{{ $beasiswa->deskripsi }}</textarea>
                                    <select name="kategori" class="form-control mb-1">
                                        <option value="Tel-U" {{ $beasiswa->kategori == 'Tel-U' ? 'selected' : '' }}>Tel-U</option>
                                        <option value="Nasional" {{ $beasiswa->kategori == 'Nasional' ? 'selected' : '' }}>Nasional</option>
                                    </select>
                                    <input type="text" name="penyelenggara" value="{{ $beasiswa->penyelenggara }}" class="form-control mb-1" required>
                                    <input type="text" name="jenjang_pendidikan" value="{{ $beasiswa->jenjang_pendidikan }}" class="form-control mb-1" required>
                                    <input type="date" name="tanggal_buka" value="{{ $beasiswa->tanggal_buka }}" class="form-control mb-1" required>
                                    <input type="date" name="tanggal_tutup" value="{{ $beasiswa->tanggal_tutup }}" class="form-control mb-1" required>
                                    <input type="url" name="link_pendaftaran" value="{{ $beasiswa->link_pendaftaran }}" class="form-control mb-1" required>
                                    <button type="submit" class="btn btn-warning btn-sm w-100">Update</button>
                                </form>
                                {{-- Delete Form --}}
                                <form action="{{ route('admin.beasiswa.destroy', $beasiswa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm w-100" onclick="return confirm('Hapus beasiswa ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>
