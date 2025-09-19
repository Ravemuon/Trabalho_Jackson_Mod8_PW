@extends('layouts.app')

@section('title', 'Editar Categoria')

@section('content')
<div class="container py-4">
    <h1 class="text-light mb-4">Editar Categoria: {{ $categoria->nome }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categorias.update', $categoria) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label text-light">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $categoria->nome) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Descrição</label>
            <textarea name="descricao" class="form-control">{{ old('descricao', $categoria->descricao) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Imagem (URL)</label>
            <input type="url" name="imagem" class="form-control" value="{{ old('imagem', $categoria->imagem) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Linha/Orixá</label>
            <select name="tipo" class="form-control" required>
                <option value="orixa" {{ old('tipo', $categoria->tipo) == 'orixa' ? 'selected' : '' }}>Orixá</option>
                <option value="linha" {{ old('tipo', $categoria->tipo) == 'linha' ? 'selected' : '' }}>Linha</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Cores</label>
            <input type="text" name="cores" class="form-control" value="{{ old('cores', $categoria->cores) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Dia da Semana</label>
            <input type="text" name="dia_semana" class="form-control" value="{{ old('dia_semana', $categoria->dia_semana) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">História</label>
            <textarea name="historia" class="form-control">{{ old('historia', $categoria->historia) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Símbolos</label>
            <input type="text" name="simbolos" class="form-control" value="{{ old('simbolos', $categoria->simbolos) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Saudações</label>
            <input type="text" name="saudacoes" class="form-control" value="{{ old('saudacoes', $categoria->saudacoes) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Personalidade</label>
            <input type="text" name="personalidade" class="form-control" value="{{ old('personalidade', $categoria->personalidade) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Animais</label>
            <input type="text" name="animais" class="form-control" value="{{ old('animais', $categoria->animais) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Elementos</label>
            <input type="text" name="elementos" class="form-control" value="{{ old('elementos', $categoria->elementos) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Datas/Rituais</label>
            <input type="text" name="datas_rituais" class="form-control" value="{{ old('datas_rituais', $categoria->datas_rituais) }}">
        </div>

        <div class="mb-3">
            <label class="form-label text-light">Notas</label>
            <textarea name="notas" class="form-control">{{ old('notas', $categoria->notas) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar Alterações</button>
        <a href="{{ route('categorias.show', $categoria) }}" class="btn btn-light">Cancelar</a>
    </form>
</div>
@endsection
