@extends('template.index')

@section('main')

<div class="container mt-5">
    <h1 class="text-center">Cadastrar Livro</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-group">
            @foreach ($errors->all() as $error)
            <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('success'))
    <div class="alert alert-primary text-center">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('livros.salvar') }}" class="row g-3" method="post">
        @csrf

        <div class="col-md-6">
            <label for="titulo" class="form-label">Título do Livro</label>
            <input type="text" class="form-control form-control-sm" id="titulo" name="titulo" required value="{{ old('titulo') }}">
        </div>

        <div class="col-md-6">
            <label for="editora" class="form-label">Editora</label>
            <input type="text" class="form-control form-control-sm" id="editora" name="editora" required value="{{ old('editora') }}">
        </div>

        <div class="col-md-6">
            <label for="edicao" class="form-label">Edição</label>
            <input type="number" class="form-control form-control-sm" id="edicao" name="edicao" required value="{{ old('edicao') }}">
        </div>

        <div class="col-md-6">
            <label for="ano_publicacao" class="form-label">Ano de Publicação</label>
            <input type="text" class="form-control form-control-sm" id="ano_publicacao" name="ano_publicacao" maxlength="4" required value="{{ old('ano_publicacao') }}">
        </div>

        <div class="col-md-6">
            <label for="assunto" class="form-label">Assunto</label>
            <select class="form-select form-select-sm" id="assunto" name="assunto_id" required>
                <option value=""> ----- </option>
                @foreach($assuntos as $assunto)
                <option value="{{ $assunto->id }}" {{ (collect(old('assunto_id'))->contains($assunto->id)) ? 'selected':'' }}>{{ $assunto->descricao }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <label for="autor" class="form-label">Autor</label>
            <select class="form-select form-select-sm" id="autor" name="autor_id" required>
                <option value=""> ----- </option>
                @foreach($autores as $autor)
                <option value="{{ $autor->id }}" {{ (collect(old('autor_id'))->contains($autor->id)) ? 'selected':'' }} >{{ $autor->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

@endsection