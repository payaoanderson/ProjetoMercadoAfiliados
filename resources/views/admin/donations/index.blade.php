@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Doações</h1>
    <a href="{{ route('admin.donations.create') }}" class="btn btn-primary mb-3">Criar Doação</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Valor</th>
                <th>Data da Criação</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($donations as $donation)
                <tr>
                    <td>{{ $donation->id }}</td>
                    <td>{{ number_format($donation->value, 2, ',', '.') }} R$</td>
                    <td>{{ $donation->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.donations.edit', $donation->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('admin.donations.destroy', $donation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                        <a href="{{ route('admin.donation.generate', $donation->id) }}" class="btn btn-primary">Gerar QR Code</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @include("include.rodape")
</div>
@endsection
