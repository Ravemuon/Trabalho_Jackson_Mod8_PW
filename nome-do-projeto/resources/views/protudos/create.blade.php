@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Novo Produto</h1>

    <form action="{{ route('produtos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Preço</label>
            <input type="number" name="preco" class="form-control" step="0.01" required>
        </div>
        <div class="mb-3">
            <label>Quantidade</label>
            <input type="number" name="quantidade" class="form-control" required>
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
            <label>Usuário</label>
            <select name="user_id" class="form-control" required>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
@endsection
