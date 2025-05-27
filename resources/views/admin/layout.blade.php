<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
        <a class="navbar-brand d-flex align-items-center" href=#">
            <img src="{{ asset('logo.png') }}" alt="Logo" style="height: 30px;" class="me-2">
            <span>Admin Panel</span>
        </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#" class="nav-link">Dashboard</a></li>
                    <li class="nav-item"><a href="{{ route('proizvodi.index') }}" class="nav-link">Proizvodi</a></li>
                    <li class="nav-item"><a href="{{ route('kategorije.index') }}" class="nav-link">Kategorije</a></li>
                    <li class="nav-item"><a href="{{ route('narudzbine.index') }}" class="nav-link">Narudžbine</a></li>
                    <li class="nav-item" style="margin-left: 30px;">
                        <a class="nav-link" href="{{ route('public.home') }}">Javni deo</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Odjavi se</a></li>
                </ul>
   

            </div>
        </div>
    </nav>

    

    <div class="container">
        @yield('content')
    </div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</body>
</html>
