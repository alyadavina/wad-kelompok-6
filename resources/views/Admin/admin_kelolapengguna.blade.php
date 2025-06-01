<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Pengguna | Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --maroon: #800000;
            --gray-light: #f2f2f2;
            --gray-dark: #343a40;
        }

        body {
            background-color: var(--gray-light);
            font-family: 'Segoe UI', sans-serif;
        }

        .table thead {
            background-color: var(--maroon);
            color: white;
        }

        .btn-maroon {
            background-color: var(--maroon);
            color: white;
        }

        .btn-maroon:hover {
            background-color: #a00000;
            color: white;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .header-title {
            color: var(--maroon);
            font-weight: bold;
        }

        .action-btn {
            font-size: 0.85rem;
            padding: 6px 10px;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="card p-4">
        <h2 class="text-center mb-4 header-title">Kelola Daftar Pengguna</h2>

        <form method="GET" action="{{ route('admin.users') }}" class="row g-3 mb-4">
            <div class="col-md-2">
                <input type="text" name="nama" class="form-control" placeholder="Nama" value="{{ request('nama') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ request('email') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="{{ request('jurusan') }}">
            </div>
            <div class="col-md-2">
                <input type="text" name="fakultas" class="form-control" placeholder="Fakultas" value="{{ request('fakultas') }}">
            </div>
            <div class="col-md-2">
                <input type="number" name="angkatan" class="form-control" placeholder="Angkatan" value="{{ request('angkatan') }}">
            </div>
            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-maroon">Cari</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Jurusan</th>
                        <th>Fakultas</th>
                        <th>Angkatan</th>                     
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $index => $pengguna)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pengguna->nama }}</td>
                            <td>{{ $pengguna->nim }}</td>
                            <td>{{ $pengguna->jurusan }}</td>
                            <td>{{ $pengguna->fakultas}}</td>
                            <td>{{ $pengguna->angkatan}}</td>
                            </td>
                        </tr>
                    @endforeach
                    @if($users->isEmpty())
                        <tr>
                            <td colspan="6">Tidak ada data pengguna</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <a href="{{ url('/admindashboard') }}" class="btn btn-maroon mt-4"> Kembali ke Dashboard</a>
    </div>
</div>

</body>
</html>