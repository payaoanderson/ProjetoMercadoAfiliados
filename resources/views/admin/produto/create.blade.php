<!-- resources/views/produtos/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Produto</h1>

    <form action="{{ route('admin.produto.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
        </div>
        <div class="form-group">
            <label for="comprar">Disponível para Compra</label>
            <input type="checkbox" id="comprar" name="comprar">
        </div>
        <button type="submit" class="btn btn-primary">Criar Produto</button>
    </form>
</div>

@endsection
