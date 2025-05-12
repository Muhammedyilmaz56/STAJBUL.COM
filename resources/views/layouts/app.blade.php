<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stajbul | @yield('title', 'Panel')</title>
    
    <!-- Bootstrap 5 (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Özel stil (varsa) -->
    <style>
        body {
            padding-top: 60px;
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand, .nav-link, .nav-link:focus, .nav-link:hover {
            color: white !important;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
        <a class="navbar-brand" href="{{ url('/student/dashboard') }}">StajBul.com</a>
        <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Çıkış Yap
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login.form') }}">Giriş</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register.student.form') }}">Öğrenci Kayıt</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register.company.form') }}">Şirket Kayıt</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- İçerik -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
