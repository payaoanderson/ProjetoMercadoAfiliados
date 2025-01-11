@extends('layouts.app')

@section('content')
    <h1>Lista de Usuários</h1>
    <a href="{{ route('admin.usuarios.create') }}" class="btn btn-primary mb-3">Criar Usuário</a>
{{-- <link rel="stylesheet" href="./css/main.css"> --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.usuarios.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.usuarios.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include("include.rodape")
    
    
    @endsection
