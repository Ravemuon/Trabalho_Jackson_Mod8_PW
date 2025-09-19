@extends('layouts.app')

@section('title', isset($categoria) ? 'Editar Categoria' : 'Nova Categoria')

@section('content')
<div class="container">
    <h1>{{ isset($categoria) ? 'Editar Categoria' : 'Nova Categoria' }}</h1>

    <form action="{{ isset($categoria) ? route('categorias.update', $categoria) : route('categorias.store') }}" method="POST">
        @csrf
        @if(isset($categoria))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $categoria->nome ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Descrição / História</label>
            <textarea name="descricao" class="form-control" required>{{ $categoria->descricao ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Imagem (URL)</label>
            <input type="url" name="imagem" class="form-control" value="{{ $categoria->imagem ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Linha</label>
            <input type="text" name="linha" class="form-control" value="{{ $categoria->linha ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Orixá</label>
            <input type="text" name="orixa" class="form-control" value="{{ $categoria->orixa ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Dia da Semana</label>
            <input type="text" name="dia_semana" class="form-control" value="{{ $categoria->dia_semana ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Cor</label>
            <input type="text" name="cor" class="form-control" value="{{ $categoria->cor ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Observações</label>
            <textarea name="observacoes" class="form-control">{{ $categoria->observacoes ?? '' }}</textarea>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="ativo" id="ativo"
                @if(isset($categoria) && $categoria->ativo) checked @endif>
            <label class="form-check-label" for="ativo">Categoria Ativa</label>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($categoria) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection
