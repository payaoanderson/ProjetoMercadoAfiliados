@extends('layouts.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="./css/main.css">
    <h1 class="my-4">Criar Compra</h1>

    <!-- Exibindo mensagens de erro -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.compras.store') }}" method="POST">
        @csrf

        <!-- Usuário -->
        <div class="mb-3">
            <label for="usuario_id" class="form-label">Usuário:</label>
            <select name="usuario_id" class="form-control" required>
                <option value="">Selecione um Usuário</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Produto -->
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto:</label>
            <select name="produto_id" class="form-control" required>
                <option value="">Selecione um Produto</option>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Quantidade -->
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" value="{{ old('quantidade') }}" class="form-control" required placeholder="Quantidade">
        </div>

        <!-- Preço Total -->
        <div class="mb-3">
            <label for="preco_total" class="form-label">Preço Total:</label>
            <input type="number" name="preco_total" value="{{ old('preco_total') }}" class="form-control" step="0.01" required placeholder="Preço Total">
        </div>

        <!-- Botão de salvar -->
        <button type="submit" class="btn btn-primary">Criar Compra</button>
    </form>
</div>
@endsection
