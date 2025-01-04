@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Nova Configuração</h1>

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

    <form action="{{ route('admin.configuracao.store') }}" method="POST">
        @csrf

        <!-- Chave -->
        <div class="mb-3">
            <label for="chave" class="form-label">Chave:</label>
            <input type="text" name="chave" value="{{ old('chave') }}" class="form-control" required placeholder="Chave da configuração">
        </div>

        <!-- Valor -->
        <div class="mb-3">
            <label for="valor" class="form-label">Valor:</label>
            <input type="text" name="valor" value="{{ old('valor') }}" class="form-control" required placeholder="Valor da configuração">
        </div>

        <!-- Botão de salvar -->
        <button type="submit" class="btn btn-primary">Criar Configuração</button>
    </form>
</div>
@endsection
