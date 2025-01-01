@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>

    <form action="{{ route('admin.produto.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $produto->nome) }}" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control">{{ old('descricao', $produto->descricao) }}</textarea>
        </div>

        <div class="form-group">
            <label for="comprar">Disponível para Compra</label>
            <select name="comprar" id="comprar" class="form-control">
                <option value="1" {{ old('comprar', $produto->comprar) == 1 ? 'selected' : '' }}>Sim</option>
                <option value="0" {{ old('comprar', $produto->comprar) == 0 ? 'selected' : '' }}>Não</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
    </form>
</div>
@endsection
