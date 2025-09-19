@extends('layouts.app')

@section('title', 'Novo Produto')

@section('content')
<h1>Novo Produto</h1>

<form action="{{ route('produtos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Preço</label>
        <input type="number" step="0.01" name="preco" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Categoria</label>
        <select name="categoria_id" class="form-control" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label>Imagem (URL)</label>
        <input type="url" name="imagem" class="form-control">
    </div>
    <button class="btn btn-success">Salvar</button>
</form>
@endsection
