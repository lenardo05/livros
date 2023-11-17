@extends('template.index')
@php $n = 1; @endphp

@section('content')
<div class="pricing-header p-3 pb-md-4 mx-auto text-center">
    <h1 class="display-4 fw-normal">Sistema de Livros Online</h1>
    <p class="fs-5 text-muted">Bem-vindo ao nosso universo literário, onde as páginas ganham vida e as histórias se desdobram com cada clique. No nosso sistema de Livros Online, oferecemos uma vasta biblioteca virtual.</p>
</div>
@endsection

@section('main')

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

<table class="table table-success table-striped table-hover">
    <thead>
        <tr class="table-dark">
            <th>#</th>
            <th>Autor</th>
            <th class="text-center">Ação</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($autores as $autor)

        <tr>
            <th scope="row">{{ $n++ }}</th>
            <td>{{ $autor->nome }}</td>
            <td class="text-center">
                <a class="btn btn-sm btn-primary" href="{{ route('autores.editar', ['id' => $autor->id]) }}">Editar</a>
                <form action="{{ route('autores.excluir', ['id' => $autor['id']]) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
@endsection