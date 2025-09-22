@extends('layouts.app')

@section('title', $categoria->nome)

@section('content')
<div class="container my-4">

    {{-- Cabeçalho --}}
    <div class="text-center mb-4">
        <h2 class="text-umbanda fw-bold">{{ $categoria->nome }}</h2>
        <p class="text-muted fst-italic small">Conheça mais sobre este Orixá</p>
    </div>

    {{-- Imagem destacada --}}
    @if($categoria->imagem)
        <div class="text-center mb-4">
            <img src="{{ $categoria->imagem }}"
                 alt="{{ $categoria->nome }}"
                 class="img-fluid shadow rounded-3"
                 style="max-width: 350px; border: 3px solid #6b3fa0;">
        </div>
    @endif

    {{-- Informações principais --}}
    <div class="row mb-4 text-center">
        <div class="col-md-4 mb-2">
            <div class="p-3 bg-light text-dark rounded-3 shadow-sm">
                <h6 class="fw-bold text-umbanda">Linha</h6>
                <p class="mb-0 small">{{ ucfirst($categoria->linha) }}</p>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="p-3 bg-light text-dark rounded-3 shadow-sm">
                <h6 class="fw-bold text-umbanda">Cores</h6>
                <p class="mb-0 small">{{ $categoria->cores }}</p>
            </div>
        </div>
        <div class="col-md-4 mb-2">
            <div class="p-3 bg-light text-dark rounded-3 shadow-sm">
                <h6 class="fw-bold text-umbanda">Dia da Semana</h6>
                <p class="mb-0 small">{{ $categoria->dia_semana }}</p>
            </div>
        </div>
    </div>

    {{-- Conteúdo detalhado --}}
    <div class="row g-4">
        @foreach(['descricao','historia','simbolos','saudacoes','personalidade','animais','elementos','datas_rituais','notas'] as $campo)
            @if($categoria->$campo)
                <div class="col-md-6">
                    <div class="card shadow-sm rounded-3 p-3 h-100">
                        <h5 class="text-umbanda fw-bold">{{ ucfirst(str_replace('_',' ',$campo)) }}</h5>
                        <p class="small text-dark">{{ $categoria->$campo }}</p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    {{-- Botão voltar --}}
    <div class="text-center mt-4">
        <a href="{{ route('categorias.index') }}" class="btn btn-umbanda btn-sm">← Voltar às Categorias</a>
    </div>

</div>
@endsection
