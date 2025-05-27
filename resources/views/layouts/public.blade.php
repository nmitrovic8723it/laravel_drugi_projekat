<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'Početna - Optika')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" />

    <!-- Bootstrap & custom CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
</head>
<body id="page-top" class="d-flex flex-column min-vh-100">
    <!-- Navigacija -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background-color: rgba(86, 101, 115, 0.5);">

        <div class="container">
            <a class="navbar-brand" href="{{ route('public.home') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                Menu <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.home') }}">Početna</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.katalog') }}">Katalog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('public.kontakt') }}">Kontakt</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('public.moje-narudzbine') }}">Moje narudžbine</a></li>
                        @if(auth()->user()->role && in_array(auth()->user()->role->name, ['admin', 'editor']))
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin.proizvodi') }}" style="color: red;">Admin Panel</a></li>
                        @endif
                        <li class="nav-item" style="margin-left: 30px;">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-link nav-link" type="submit">Odjavi se</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Prijava</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Registracija</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="flex-fill">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer py-4 bg-dark text-light" style="margin-top: 20px;">
        <div class="container text-center">
            <small>&copy; Nemanja Mitrović 87/23 IT</small>
        </div>
    </footer>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
