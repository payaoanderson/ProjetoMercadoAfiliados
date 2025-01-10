@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Criar Doação</h1>
    <form action="{{ route('admin.donations.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="value">Valor da Doação</label>
            <input type="number" step="0.01" name="value" id="value" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
