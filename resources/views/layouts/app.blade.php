<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Sistem Beasiswa Telbea')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            min-height: 100vh;
            background-color: #f8f9fa;
        }
        .bg-maroon {
            background-color: #800000 !important;
        }
        .text-maroon {
            color: #800000 !important;
        }
        .btn-maroon {
            background-color: #800000;
            color: white;
        }
        .btn-maroon:hover {
            background-color: #5a0000;
            color: white;
        }
        /* Sidebar */
        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #800000;
            color: white;
            min-height: 100vh;
        }
        #sidebar .nav-link {
            color: white;
        }
        #sidebar .nav-link.active {
            background-color: #5a0000;
        }
        /* Content */
        #content {
            width: 100%;
            padding: 20px;
        }
        /* Navbar override */
        nav.navbar {
            background-color: #800000 !important;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <nav id="sidebar" class="d-flex flex-column p-3">
            <h4 class="text-center py-3 border-bottom">Sistem Beasiswa</h4>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="fas fa-file-alt me-2"></i> Pengajuan Beasiswa
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="fas fa-bell me-2"></i> Notifikasi
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs me-2"></i> Pengaturan
                    </a>
                </li>
            </ul>
            <hr />
            <div class="dropdown px-3">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle fa-2x me-2"></i>
                    <strong>{{ Auth::guard('mahasiswa')->user()->name }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="content" class="flex-grow-1">
            <nav class="navbar navbar-expand navbar-dark mb-3">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1 text-maroon">@yield('page-title', 'Dashboard')</span>
                </div>
            </nav>

            <main>
                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
