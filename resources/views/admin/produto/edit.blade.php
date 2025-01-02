@extends('layouts.app')

@section('content')
<div class="container">
    <link rel="stylesheet" href="./css/main.css">
    <h1 class="my-4">Editar Produto</h1>

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

    <form action="{{ route('admin.produto.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nome -->
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" value="{{ old('nome', $produto->nome) }}" class="form-control" required placeholder="Nome">
        </div>

        <!-- Descrição -->
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea name="descricao" placeholder="Descrição" class="form-control" rows="4">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <!-- Preço -->
        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" name="preco" value="{{ old('preco', $produto->preco) }}" class="form-control" step="0.01" required placeholder="Preço">
        </div>

        <!-- Quantidade -->
        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" name="quantidade" value="{{ old('quantidade', $produto->quantidade) }}" class="form-control" required placeholder="Quantidade">
        </div>

        <!-- Botão de salvar -->
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
