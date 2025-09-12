@extends('layouts.app')

@section('title','Categorias')

@section('content')
<h1>Categorias</h1>
<ul>
@foreach($categorias as $categoria)
    <li>{{ $categoria->nome }}</li>
@endforeach
</ul>
@endsection
