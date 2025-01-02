@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nova Venda</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.sales.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="produto_id">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                @foreach($produtos as $produto)
                    <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="preco_total">Preço Total</label>
            <input type="number" name="preco_total" id="preco_total" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
