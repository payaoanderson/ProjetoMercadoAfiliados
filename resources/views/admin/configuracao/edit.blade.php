@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Configuração</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.configuracao.update', $configuracao->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="chave" class="form-label">Chave:</label>
            <input type="text" name="chave" value="{{ old('chave', $configuracao->chave) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="text" name="valor" value="{{ old('valor', $configuracao->valor) }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection
