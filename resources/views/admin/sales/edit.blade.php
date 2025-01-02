@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Venda</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <form action="{{ route('admin.sales.update', $sale->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="produto_id">Produto</label>
            <select name="produto_id" id="produto_id" class="form-control" required>
                @foreach ($produtos as $produto)
                    <option value="{{ $produto->id }}" 
                        {{ $sale->produto_id == $produto->id ? 'selected' : '' }}>
                        {{ $produto->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" class="form-control" value="{{ $sale->quantidade }}" required>
        </div>

        <div class="form-group">
            <label for="preco_total">Preço Total</label>
            <input type="number" name="preco_total" id="preco_total" class="form-control" value="{{ $sale->preco_total }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="checkbox" id="status" name="status" {{ $sale->status ? 'checked' : '' }}>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
