<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Informasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --maroon: #800000;
            --gray-light: #f2f2f2;
            --gray-dark: #333;
        }

        body {
            background: linear-gradient(120deg, var(--maroon), var(--gray-light));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card {
            background-color: #fff;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 400px;
        }

        .login-card h2 {
            font-weight: bold;
            color: var(--maroon);
            margin-bottom: 30px;
        }

        .btn-maroon {
            background-color: var(--maroon);
            color: white;
            transition: 0.3s;
        }

        .btn-maroon:hover {
            background-color: #a00000;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(128, 0, 0, 0.25);
            border-color: var(--maroon);
        }

        .form-text {
            font-size: 0.9rem;
            color: #888;
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: var(--maroon);
            text-decoration: none;
        }

        .back-home:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <h2 class="text-center">Telbea Login</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-maroon">Masuk</button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a class="form-text" href="{{ route('password.request') }}">
                        Lupa kata sandi?
                    </a>
                </div>
            @endif
        </form>

        <a href="{{ url('/') }}" class="back-home">← Kembali ke Beranda</a>
    </div>

</body>
</html>

