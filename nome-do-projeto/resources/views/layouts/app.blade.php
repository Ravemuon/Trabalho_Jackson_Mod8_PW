<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Altar Oculto')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #1c1c2b;
            color: #f0f0f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        a.nav-link {
            color: #f0f0f5 !important;
        }

        a.nav-link:hover {
            color: #c5b3ff !important;
        }

        .navbar {
            background-color: #2c2c3e;
        }

        .border-purple {
            border: 2px solid #7d5fff !important;
        }

        .hero h1 {
            color: #7d5fff;
            font-weight: bold;
        }

        .hero p {
            color: #f0f0f5;
            font-size: 1.2rem;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(100%);
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" style="color:#7d5fff; font-weight:bold;">Altar Oculto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/entidades') }}">Entidades</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/produtos') }}">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/encomendas') }}">Encomendas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo principal -->
<div class="container my-4">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center py-4 mt-5" style="background-color:#2c2c3e; color:#c5b3ff;">
    <p>&copy; {{ date('Y') }} Altar Oculto. Todos os direitos reservados.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
