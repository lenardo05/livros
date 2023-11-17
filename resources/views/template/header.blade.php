<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <title>Livros Online</title>

  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

  <header class="p-3 bg-dark text-white">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <div class="col text-start">
          <div class="container-fluid">
            <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
              <img src="{{ asset('images/livro.png') }}" alt="Livros Online" width="40" height="32" class="me-2">
              <span class="fs-4 text-white">Livros Online</span>
            </a>
          </div>
        </div>
        <div class="col col-3 text-end">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Livros
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('livros.index') }}">Listar</a></li>
                  <li><a class="dropdown-item" href="{{ route('livros.cadastrar') }}">Cadastrar</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Autores
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('autores.index') }}">Listar</a></li>
                  <li><a class="dropdown-item" href="{{ route('autores.cadastrar') }}">Cadastrar</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link text-light dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Assuntos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="{{ route('assuntos.index') }}">Listar</a></li>
                  <li><a class="dropdown-item" href="{{ route('assuntos.cadastrar') }}">Cadastrar</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

  </header>
  <div class="container py-3">

    @yield('content')