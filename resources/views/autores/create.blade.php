@extends('template.index')

@section('main')

<div class="container mt-5">
    <h1 class="text-center">Cadastrar Autor</h1>

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

    <form action="{{ route('autores.salvar') }}" class="row g-3" method="post">
        @csrf

        <div class="col-md-6">
            <label for="autor" class="form-label">Autor</label>
            <input type="text" class="form-control form-control-sm" id="nome" name="nome" required value="{{ old('nome') }}">
        </div>

        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
    </form>
</div>

@endsection