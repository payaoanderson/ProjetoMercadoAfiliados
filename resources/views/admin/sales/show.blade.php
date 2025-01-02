@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Venda</h1>

    <div class="card">
        <div class="card-header">
            {{ $sale->produto->nome }} <!-- Nome do produto -->
        </div>
        <div class="card-body">
            <h5 class="card-title">Descrição:</h5>
            <p class="card-text">{{ $sale->produto->descricao }}</p>

            <h5 class="card-title">Quantidade:</h5>
            <p class="card-text">{{ $sale->quantidade }}</p>

            <h5 class="card-title">Preço Total:</h5>
            <p class="card-text">{{ number_format($sale->preco_total, 2, ',', '.') }}</p>

            <a href="{{ route('admin.sales.edit', $sale->id) }}" class="btn btn-primary">Editar Venda</a>
        </div>
    </div>
</div>
@endsection
