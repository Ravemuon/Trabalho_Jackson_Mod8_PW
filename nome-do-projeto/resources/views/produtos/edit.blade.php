@extends('layouts.app')

@section('title', isset($produto) ? 'Editar Produto' : 'Novo Produto')

@section('content')
<div class="container my-4">
    <h1 class="text-umbanda mb-4 text-center">{{ isset($produto) ? 'Editar Produto' : 'Novo Produto' }}</h1>

    <a href="{{ route('produtos.index') }}" class="btn btn-umbanda mb-4">← Voltar aos Produtos</a>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($produto) ? route('produtos.update', $produto) : route('produtos.store') }}" method="POST">
        @csrf
        @if(isset($produto))
            @method('PUT')
        @endif

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ $produto->nome ?? '' }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Preço</label>
                <input type="number" step="0.01" name="preco" class="form-control" value="{{ $produto->preco ?? '' }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Categoria</label>
                <select name="categoria_id" class="form-select" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            @if(isset($produto) && $produto->categoria_id == $categoria->id) selected @endif>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Estoque</label>
                <input type="number" name="estoque" class="form-control" value="{{ $produto->estoque ?? 0 }}" required>
            </div>

            <div class="col-md-12">
                <label class="form-label">Descrição</label>
                <textarea name="descricao" class="form-control" rows="3" required>{{ $produto->descricao ?? '' }}</textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label">Imagem (URL)</label>
                <input type="url" name="imagem" class="form-control" value="{{ $produto->imagem ?? '' }}">
            </div>

            <div class="col-md-6">
                <label class="form-label">Código</label>
                <input type="text" name="codigo" class="form-control" value="{{ $produto->codigo ?? '' }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" class="form-control" value="{{ $produto->peso ?? '' }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Dimensões (L x A x P cm)</label>
                <input type="text" name="dimensoes" class="form-control" value="{{ $produto->dimensoes ?? '' }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Tags (vírgula separada)</label>
                <input type="text" name="tags" class="form-control" value="{{ $produto->tags ?? '' }}">
            </div>

            <div class="col-md-6 form-check">
                <input type="checkbox" class="form-check-input" name="popular" id="popular"
                    @if(isset($produto) && $produto->popular) checked @endif>
                <label class="form-check-label" for="popular">Produto Popular</label>
            </div>

            <div class="col-md-6 form-check">
                <input type="checkbox" class="form-check-input" name="ativo" id="ativo"
                    @if(isset($produto) && $produto->ativo) checked @endif>
                <label class="form-check-label" for="ativo">Produto Ativo</label>
            </div>

            <div class="col-md-12">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control" rows="2">{{ $produto->observacoes ?? '' }}</textarea>
            </div>
        </div>

        <div class="text-center mt-4">
            <button type="submit" class="btn btn-umbanda btn-lg">{{ isset($produto) ? 'Atualizar Produto' : 'Salvar Produto' }}</button>
        </div>
    </form>
</div>
@endsection
