@extends('layouts.app')

@section('title', isset($encomenda) ? 'Editar Encomenda' : 'Nova Encomenda')

@section('content')
<h1>{{ isset($encomenda) ? 'Editar Encomenda' : 'Nova Encomenda' }}</h1>

<form action="{{ isset($encomenda) ? route('encomendas.update', $encomenda) : route('encomendas.store') }}" method="POST">
    @csrf
    @if(isset($encomenda))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label>Nome do Cliente</label>
        <input type="text" name="nome_cliente" class="form-control" value="{{ $encomenda->nome_cliente ?? old('nome_cliente') }}" required>
    </div>

    <div class="mb-3">
        <label>Email do Cliente</label>
        <input type="email" name="email_cliente" class="form-control" value="{{ $encomenda->email_cliente ?? old('email_cliente') }}" required>
    </div>

    <div class="mb-3">
        <label>Produto</label>
        <select name="produto_id" class="form-control" required>
            @foreach($produtos as $produto)
                <option value="{{ $produto->id }}"
                    {{ (isset($encomenda) && $encomenda->produto_id == $produto->id) ? 'selected' : '' }}>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control" value="{{ $encomenda->quantidade ?? old('quantidade') }}" min="1" required>
    </div>

    <div class="mb-3">
        <label>Observações</label>
        <textarea name="observacoes" class="form-control">{{ $encomenda->observacoes ?? old('observacoes') }}</textarea>
    </div>

    <button class="btn btn-success">{{ isset($encomenda) ? 'Atualizar' : 'Salvar' }}</button>
</form>
@endsection
