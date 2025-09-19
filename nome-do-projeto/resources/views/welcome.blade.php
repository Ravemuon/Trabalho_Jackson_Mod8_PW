@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="hero text-center text-light mb-5 p-5 rounded-3" style="background-color:#1f1f1f;">
    <h1 class="display-4 fw-bold" style="color:#f5f5f5;">Altar Oculto</h1>
    <p class="lead mt-3" style="color:#dcdcdc;">
        Explore entidades da Umbanda, produtos místicos e encomende imagens de santos personalizadas.
    </p>
</div>

<section class="mb-5">
    @foreach($categorias as $categoria)
    <div class="categoria mb-5">
        <!-- Título da categoria -->
        <h3 class="text-light mb-4 text-center">{{ $categoria->nome }}</h3>
        <div class="d-flex justify-content-center flex-wrap">
            @forelse($categoria->produtos as $produto)
            <div class="card bg-dark text-light border-light mx-2 my-2 shadow-sm" style="width: 18rem; cursor:pointer; transition: transform 0.3s;"
                 onclick="alert('Produto: {{ $produto->nome }} - R$ {{ number_format($produto->preco,2,",",".") }}')"
                 onmouseover="this.style.transform='scale(1.05)'"
                 onmouseout="this.style.transform='scale(1)'">
                <img src="{{ $produto->imagem ?? 'https://via.placeholder.com/300x200.png?text='.$produto->nome }}" class="card-img-top" alt="{{ $produto->nome }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p class="card-text">R$ {{ number_format($produto->preco,2,",",".") }}</p>
                </div>
            </div>
            @empty
            <p class="text-light text-center w-100">Nenhum produto disponível nesta categoria.</p>
            @endforelse
        </div>
    </div>
    @endforeach
</section>
@endsection
