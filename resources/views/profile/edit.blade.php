<!DOCTYPE html>
<html>
<head>
    <title>Edit Profil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(to right, #ff4d4d, #b30000);
            color: #fff;
            padding: 40px;
        }
        .container {
            background: #fff;
            color: #000;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            margin: auto;
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        .btn-delete {
            background-color: #ff4d4d;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Profil</h2>

        @if (session('status'))
            <p style="color: green">{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <label>Nama:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

            <button type="submit">Simpan Perubahan</button>
        </form>

        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Yakin ingin menghapus akun?')">
            @csrf
            @method('DELETE')

            <label>Password untuk konfirmasi:</label>
            <input type="password" name="password" required>

            <button class="btn-delete" type="submit">Hapus Akun</button>
        </form>

        <br>
        <a href="{{ route('dashboard') }}">← Kembali ke Dashboard</a>
    </div>
</body>
</html>
