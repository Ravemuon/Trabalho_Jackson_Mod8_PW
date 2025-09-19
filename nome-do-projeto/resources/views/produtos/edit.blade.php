@extends('layouts.app')

@section('title', isset($produto) ? 'Editar Produto' : 'Novo Produto')

@section('content')
<div class="container">
    <h1>{{ isset($produto) ? 'Editar Produto' : 'Novo Produto' }}</h1>

    <form action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" method="POST">
        @csrf
        @if(isset($produto))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $produto->nome ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Descrição</label>
            <textarea name="descricao" class="form-control" required>{{ $produto->descricao ?? '' }}</textarea>
        </div>

        <div class="mb-3">
            <label>Preço</label>
            <input type="number" step="0.01" name="preco" class="form-control" value="{{ $produto->preco ?? '' }}" required>
        </div>

        <div class="mb-3">
            <label>Categoria</label>
            <select name="categoria_id" class="form-control" required>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        @if(isset($produto) && $produto->categoria_id == $categoria->id) selected @endif>
                        {{ $categoria->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Imagem (URL)</label>
            <input type="url" name="imagem" class="form-control" value="{{ $produto->imagem ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Estoque</label>
            <input type="number" name="estoque" class="form-control" value="{{ $produto->estoque ?? 0 }}" required>
        </div>

        <div class="mb-3">
            <label>Código</label>
            <input type="text" name="codigo" class="form-control" value="{{ $produto->codigo ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Peso (kg)</label>
            <input type="number" step="0.01" name="peso" class="form-control" value="{{ $produto->peso ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Dimensões (L x A x P cm)</label>
            <input type="text" name="dimensoes" class="form-control" value="{{ $produto->dimensoes ?? '' }}">
        </div>

        <div class="mb-3">
            <label>Tags (separadas por vírgula)</label>
            <input type="text" name="tags" class="form-control" value="{{ $produto->tags ?? '' }}">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="popular" id="popular"
                @if(isset($produto) && $produto->popular) checked @endif>
            <label class="form-check-label" for="popular">Produto Popular</label>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="ativo" id="ativo"
                @if(isset($produto) && $produto->ativo) checked @endif>
            <label class="form-check-label" for="ativo">Produto Ativo</label>
        </div>

        <div class="mb-3">
            <label>Observações</label>
            <textarea name="observacoes" class="form-control">{{ $produto->observacoes ?? '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($produto) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>
@endsection
