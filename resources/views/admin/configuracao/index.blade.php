@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Configurações do Site</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Chave</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($configuracoes as $config)
                <tr>
                    <td>{{ $config->chave }}</td>
                    <td>{{ $config->valor }}</td>
                    <td>
                        <a href="{{ route('admin.configuracao.edit', $config->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <a href="{{ route('admin.configuracao.create') }}" class="btn btn-primary mt-3">Criar Nova Configuração</a>
    </table>

    
    @include("include.rodape")
</div>
@endsection
