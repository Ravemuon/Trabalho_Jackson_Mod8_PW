@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos da Loja de Ocultismo</h1>
    <a href="{{ route('produtos.create') }}" class="btn btn-primary mb-3">Novo Produto</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
            <tr>
                <td>{{ $produto->id }}</td>
                <td>{{ $produto->nome }}</td>
                <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                <td>{{ $produto->quantidade }}</td>
                <td>{{ $produto->categoria->nome }}</td>
                <td>{{ $produto->user->name }}</td>
                <td>
                    <a href="{{ route('produtos.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('produtos.destroy', $produto) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
