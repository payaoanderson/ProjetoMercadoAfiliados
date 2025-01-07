@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Adicionar Novo Patrocinador</h1>
    <form action="{{ route('admin.patrocinadores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control @error('nome') is-invalid @enderror" value="{{ old('nome') }}" required>
            @error('nome')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" class="form-control @error('descricao') is-invalid @enderror">{{ old('descricao') }}</textarea>
            @error('descricao')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        {{-- <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" id="imagem" class="form-control-file @error('imagem') is-invalid @enderror">
            @error('imagem')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div> --}}
        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        <a href="{{ route('admin.patrocinadores.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
    </form>
</div>
@endsection
