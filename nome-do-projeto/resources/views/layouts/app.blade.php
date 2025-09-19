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
        /* Corpo e fonte */
        body {
            background: linear-gradient(180deg, #1b1b2a, #121121);
            color: #e0dff8;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        a.nav-link {
            color: #e0dff8 !important;
            transition: color 0.3s;
        }

        a.nav-link:hover {
            color: #c297ff !important;
        }

        /* Navbar */
        .navbar {
            background-color: #251f3f;
            padding: 1rem 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.4);
        }

        .navbar-brand {
            color: #c297ff !important;
            font-weight: bold;
            font-size: 1.6rem;
            text-shadow: 1px 1px 4px #000;
        }

        /* Hero */
        .hero {
            background-color: rgba(40, 30, 60, 0.9);
            padding: 70px 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 50px;
            box-shadow: 0 0 20px rgba(125, 95, 255, 0.6);
        }

        .hero h1 {
            color: #c297ff;
            font-weight: 900;
            font-size: 3rem;
            text-shadow: 2px 2px 8px #000;
        }

        .hero p {
            color: #e0dff8;
            font-size: 1.2rem;
        }

        /* Cards */
        .card-dark {
            background-color: #2a243f;
            color: #e0dff8;
            border: 2px solid #c297ff;
            border-radius: 12px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card-dark:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(194, 151, 255, 0.6);
        }

        .card-dark img {
            border-bottom: 1px solid #c297ff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        /* Botões */
        .btn-purple {
            background-color: #c297ff;
            color: #1b1b2a;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-purple:hover {
            background-color: #9c6cff;
            color: #fff;
            transform: scale(1.05);
        }

        /* Footer */
        footer {
            background-color: #251f3f;
            color: #c297ff;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.5);
            padding: 1rem 0;
        }

        footer p {
            margin: 0;
            font-size: 0.9rem;
        }

        /* Links especiais */
        .text-purple {
            color: #c297ff !important;
        }

        /* Cards responsivos */
        .category-card {
            margin-bottom: 30px;
        }

        .category-card img {
            max-height: 220px;
            object-fit: cover;
        }

        /* Scroll suave para links internos */
        html {
            scroll-behavior: smooth;
        }

    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Altar Oculto</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/categorias') }}">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/produtos') }}">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/encomendas') }}">Encomendas</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contato') }}">Contato</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo principal -->
<div class="container my-5">
    @yield('content')
</div>

<!-- Footer -->
<footer class="text-center">
    <p>&copy; {{ date('Y') }} Altar Oculto. Todos os direitos reservados.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
