@extends('layouts.app')

@section('title', 'Contato')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Contato</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('contato.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite seu nome" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="exemplo@email.com" required>
        </div>
        <div class="mb-3">
            <label for="mensagem" class="form-label">Mensagem</label>
            <textarea id="mensagem" name="mensagem" class="form-control" rows="6" placeholder="Escreva sua mensagem aqui..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
