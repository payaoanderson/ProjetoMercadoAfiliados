@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <!-- Card de Usuários -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Usuários</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Usuários</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>

        <!-- Card de Produtos -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Produtos</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Produtos</h5>
                    <p class="card-text">{{ $productCount }}</p>
                </div>
            </div>
        </div>

        <!-- Card de Vendas -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-header">Vendas</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Vendas</h5>
                    <p class="card-text">{{ $saleCount }}</p>
                </div>
            </div>
        </div>

        <!-- Card de Compras -->
        <div class="col-md-3">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Compras</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Compras</h5>
                    <p class="card-text">{{ $compraCount }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
