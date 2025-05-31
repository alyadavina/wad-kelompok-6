<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, #AD1457, #FCE4EC);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            background: #ff4e50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
        }
        a {
            color: #ff4e50;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="card">
    <h2>Form Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Masukkan Email" required>
        <input type="password" name="password" placeholder="Masukkan Password" required>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register.form') }}">Daftar Sekarang</a></p>
</div>
</body>
</html>
