@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vendas</h1>
    <a href="{{ route('admin.sales.create') }}" class="btn btn-primary mb-3">Nova Venda</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Total</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->produto->nome }}</td>
                <td>{{ $sale->quantidade }}</td>
                <td>{{ number_format($sale->preco_total, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('admin.sales.show', $sale->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('admin.sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('admin.sales.destroy', $sale->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
    {{ $sales->links() }}
    @include("include.rodape")
</div>
@endsection
