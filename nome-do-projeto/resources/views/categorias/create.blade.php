@extends('layouts.app')

@section('title', 'Nova Categoria')

@section('content')
<div class="container">
    <h1 class="mb-4 text-light">Nova Categoria</h1>

    <form action="{{ route('categorias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('categorias.partials.form', ['button' => 'Salvar'])
    </form>
</div>
@endsection
