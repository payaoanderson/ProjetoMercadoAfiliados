@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('admin.patrocinadores.create') }}" class="btn btn-primary mb-3">Novo Patrocinador</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patrocinadores as $patrocinador)
                <tr>
                    <td>{{ $patrocinador->id }}</td>
                    <td>{{ $patrocinador->nome }}</td>
                    <td>{{ $patrocinador->descricao }}</td>
                    <td>
                        <a href="{{ route('admin.patrocinadores.edit', $patrocinador) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.patrocinadores.destroy', $patrocinador) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include("include.rodape")
</div>
@endsection
