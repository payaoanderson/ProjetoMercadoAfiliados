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
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-light">Ir para Usuários</a>
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
                    <a href="{{ route('admin.produto.index') }}" class="btn btn-light">Ir para Produtos</a>
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
                    <a href="{{ route('admin.sales.index') }}" class="btn btn-light">Ir para Vendas</a>
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
                    <a href="{{ route('admin.compras.index') }}" class="btn btn-light">Ir para Compras</a>
                </div>
            </div>
        </div>

        <!-- Card de Configurações -->
        <div class="col-md-3">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">Configurações</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Configurações</h5>
                    <p class="card-text">{{ $configuracaoCount }}</p>
                    <a href="{{ route('admin.configuracao.index') }}" class="btn btn-light">Ir para Configurações</a>
                </div>
            </div>
        </div>

        <!-- Card de Relatórios -->
        <div class="col-md-3">
            <div class="card text-white bg-dark mb-3">
                <div class="card-header">Relatórios</div>
                <div class="card-body">
                    <h5 class="card-title">Total de Relatórios</h5>
                    <p class="card-text">{{ $relatorioCount }}</p> <!-- Exibindo a quantidade de relatórios -->
                    <a href="{{ route('admin.relatorio.index') }}" class="btn btn-light">Ir para Relatórios</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
