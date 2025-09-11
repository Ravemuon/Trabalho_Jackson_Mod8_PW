<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja de Ocultismo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark text-light">

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-black shadow mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                🕯️ Loja de Ocultismo
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categorias*') ? 'active' : '' }}" href="{{ route('categorias.index') }}">
                            Categorias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('produtos*') ? 'active' : '' }}" href="{{ route('produtos.index') }}">
                            Produtos
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- Conteúdo principal --}}
    <main class="container">
        @yield('content')
    </main>

    {{-- Rodapé --}}
    <footer class="bg-black text-center text-secondary py-3 mt-4">
        <p class="mb-0">✨ Loja de Ocultismo © {{ date('Y') }} - Feita com Laravel</p>
    </footer>

</body>
</html>
