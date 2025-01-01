<!-- resources/views/produtos/index.blade.php -->
<link rel="stylesheet" href="./css/main.css">
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Produtos</h1>
    <a href="{{ route('admin.produto.create') }}" class="btn btn-primary mb-3">Criar Produto</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>
                        <a href="{{ route('admin.produto.edit', $produto) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.produto.destroy', $produto) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include("include.rodape")
@endsection
