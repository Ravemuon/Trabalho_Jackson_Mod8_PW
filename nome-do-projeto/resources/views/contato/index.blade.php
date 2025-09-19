@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<div class="container">
    <h1>Contato</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('contato.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Mensagem</label>
            <textarea name="mensagem" class="form-control" rows="5" required></textarea>
        </div>
        <button class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
