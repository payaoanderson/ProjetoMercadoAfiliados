<!-- resources/views/produtos/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Produto</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.produto.store') }}" method="POST">
        @csrf
    
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" required>
        </div>
    
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" class="form-control">{{ old('descricao') }}</textarea>
        </div>
    
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" name="preco" class="form-control" value="{{ old('preco') }}" required>
        </div>
    
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" name="quantidade" class="form-control" value="{{ old('quantidade') }}" required>
        </div>
    
        <button type="submit" class="btn btn-primary mt-3">Salvar Produto</button>
    </form>
</div>
@endsection
