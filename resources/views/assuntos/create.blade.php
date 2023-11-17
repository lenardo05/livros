@extends('template.index')

@section('main')

<div class="container mt-5">
    <h1 class="text-center">Cadastrar Assunto</h1>

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

    <form action="{{ route('assuntos.salvar') }}" class="row g-3" method="post">
        @csrf

        <div class="col-md-6">
            <label for="assunto" class="form-label">Assunto</label>
            <input type="text" class="form-control form-control-sm" id="descricao" name="descricao" required value="{{ old('descricao') }}">
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

@endsection