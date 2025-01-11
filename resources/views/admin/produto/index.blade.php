<!-- resources/views/produtos/index.blade.php -->
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
                <th>Quantidade</th>
                <th>Preço</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ number_format($produto->preco, 2, ',', '.') }} R$</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>
                        <a href="{{ route('admin.produto.edit', $produto->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.produto.destroy', $produto->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include("include.rodape")
</div>


@endsection
