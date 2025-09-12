@extends('layouts.app')

@section('title','Produtos')

@section('content')
<h1>Produtos</h1>
<ul>
@foreach($produtos as $produto)
    <li>{{ $produto->nome }} - R$ {{ $produto->preco }}</li>
@endforeach
</ul>
@endsection
