<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #800000 40%, #f9f5f0 100%);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 1rem;
            border-radius: 8px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 1rem;
            background: #800000;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #a00000;
        }

        a {
            color: #800000;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
<div class="card">
    <h2>Form Login</h2>

    @if(session('error'))
        <div style="color: red; font-size: 0.9rem; margin-bottom: 1rem;">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register.form') }}">Daftar Sekarang</a></p>
</div>
</body>
</html>
