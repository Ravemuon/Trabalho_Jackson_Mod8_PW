@extends('layouts.app')

@section('title', isset($encomenda) ? 'Editar Encomenda' : 'Nova Encomenda')

@section('content')
<div class="container">
    <h1 class="mb-4 text-light">{{ isset($encomenda) ? 'Editar Encomenda' : 'Nova Encomenda' }}</h1>

    <form action="{{ isset($encomenda) ? route('encomendas.update', $encomenda) : route('encomendas.store') }}" method="POST">
        @csrf
        @if(isset($encomenda))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="text-light">Nome do Cliente</label>
            <input type="text" name="nome_cliente" class="form-control"
                   value="{{ $encomenda->nome_cliente ?? old('nome_cliente') }}" required>
        </div>

        <div class="mb-3">
            <label class="text-light">Email do Cliente</label>
            <input type="email" name="email_cliente" class="form-control"
                   value="{{ $encomenda->email_cliente ?? old('email_cliente') }}" required>
        </div>

        <div class="mb-3">
            <label class="text-light">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                <option value="">Selecione um produto</option>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}"
                        data-preco="{{ $produto->preco }}"
                        {{ (isset($encomenda) && $encomenda->produto_id == $produto->id) ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="text-light">Preço Unitário</label>
                <input type="text" id="preco_unitario" class="form-control" value="-" readonly>
            </div>

            <div class="col-md-4 mb-3">
                <label class="text-light">Quantidade</label>
                <input type="number" name="quantidade" id="quantidade" class="form-control"
                       value="{{ $encomenda->quantidade ?? old('quantidade', 1) }}" min="1" required>
            </div>

            <div class="col-md-4 mb-3">
                <label class="text-light">Valor Total</label>
                <input type="text" id="valor_total" class="form-control" value="-" readonly>
            </div>
        </div>

        <div class="mb-3">
            <label class="text-light">Observações</label>
            <textarea name="observacoes" class="form-control">{{ $encomenda->observacoes ?? old('observacoes') }}</textarea>
        </div>

        <button class="btn btn-success">{{ isset($encomenda) ? 'Atualizar' : 'Salvar' }}</button>
    </form>
</div>

{{-- Script para calcular valores --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const produtoSelect = document.getElementById("produto_id");
        const precoUnitarioInput = document.getElementById("preco_unitario");
        const quantidadeInput = document.getElementById("quantidade");
        const valorTotalInput = document.getElementById("valor_total");

        function atualizarValores() {
            const selected = produtoSelect.options[produtoSelect.selectedIndex];
            const preco = parseFloat(selected.getAttribute("data-preco")) || 0;
            const quantidade = parseInt(quantidadeInput.value) || 1;

            precoUnitarioInput.value = preco > 0 ? "R$ " + preco.toFixed(2).replace(".", ",") : "-";
            valorTotalInput.value = preco > 0 ? "R$ " + (preco * quantidade).toFixed(2).replace(".", ",") : "-";
        }

        produtoSelect.addEventListener("change", atualizarValores);
        quantidadeInput.addEventListener("input", atualizarValores);

        atualizarValores(); // inicializar caso já venha preenchido
    });
</script>
@endsection
