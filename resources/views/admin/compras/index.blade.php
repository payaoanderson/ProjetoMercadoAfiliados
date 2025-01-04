@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Compras</h1>
    <a href="{{ route('admin.compras.create') }}" class="btn btn-primary mb-3">Criar Compra</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
                <tr>
                    <td>{{ $compra->id }}</td>
                    <td>{{ $compra->usuario ? $compra->usuario->nome : 'Não atribuído' }}</td>
                    <td>{{ $compra->produto->nome }}</td>
                    <td>{{ $compra->quantidade }}</td>
                    <td>{{ number_format($compra->preco_total, 2, ',', '.') }} R$</td>
                    <td>
                        <a href="{{ route('admin.compras.edit', $compra->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.compras.destroy', $compra->id) }}" method="POST" style="display:inline;">
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
