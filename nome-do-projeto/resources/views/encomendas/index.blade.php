@extends('layouts.app')

@section('title', 'Encomendas')

@section('content')
<h1>Encomendas</h1>

<a href="{{ route('encomendas.create') }}" class="btn btn-primary mb-3">Nova Encomenda</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Email</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($encomendas as $encomenda)
        <tr>
            <td>{{ $encomenda->nome_cliente }}</td>
            <td>{{ $encomenda->email_cliente }}</td>
            <td>{{ $encomenda->produto->nome }}</td>
            <td>{{ $encomenda->quantidade }}</td>
            <td>
                <a href="{{ route('encomendas.edit', $encomenda) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('encomendas.destroy', $encomenda) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
