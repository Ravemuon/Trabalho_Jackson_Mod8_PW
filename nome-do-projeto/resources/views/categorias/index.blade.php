@extends('layouts.app')

@section('title', 'Categorias')

@section('content')
<div class="row mb-5">
    <!-- LINHAS -->
    <div class="col-md-6">
        <h3 class="text-purple mb-4">Linhas</h3>
        @forelse($linhas as $categoria)
            <div class="card card-dark mb-4 category-card">
                <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->nome }}</h5>
                    <p class="card-text">{{ $categoria->descricao }}</p>
                    <a href="{{ url('/produtos?categoria=' . $categoria->id) }}" class="btn btn-purple">Ver Produtos</a>
                </div>
            </div>
        @empty
            <p>Nenhuma linha cadastrada.</p>
        @endforelse
    </div>

    <!-- ORIXÁS -->
    <div class="col-md-6">
        <h3 class="text-purple mb-4">Orixás</h3>
        @forelse($orixas as $categoria)
            <div class="card card-dark mb-4 category-card">
                <img src="{{ $categoria->imagem }}" class="card-img-top" alt="{{ $categoria->nome }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $categoria->nome }}</h5>
                    <p class="card-text">{{ $categoria->descricao }}</p>
                    <a href="{{ url('/produtos?categoria=' . $categoria->id) }}" class="btn btn-purple">Ver Produtos</a>
                </div>
            </div>
        @empty
            <p>Nenhum orixá cadastrado.</p>
        @endforelse
    </div>
</div>
@endsection
