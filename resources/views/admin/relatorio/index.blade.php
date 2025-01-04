@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Relatórios</h1>
    <a href="{{ route('admin.relatorio.create') }}" class="btn btn-primary mb-3">Criar Relatório</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Tipo</th>
                <th>Criado Em</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relatorios as $relatorio)
                <tr>
                    <td>{{ $relatorio->id }}</td>
                    <td>{{ $relatorio->nome }}</td>
                    <td>{{ $relatorio->descricao }}</td>
                    <td>{{ $relatorio->tipo }}</td>
                    <td>{{ $relatorio->created_at }}</td>
                    <td>
                        <a href="{{ route('admin.relatorio.edit', $relatorio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.relatorio.destroy', $relatorio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
