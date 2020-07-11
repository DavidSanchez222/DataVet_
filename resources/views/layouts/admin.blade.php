@extends('layouts.app')

@section('content')
<main class="admin">
    <header class="header">
        <nav class="navbar navbar-expand-md navbar-dark bg-success shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name . ' ' . Auth::user()->lastname }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <menu class="menu">
        <div class="card">
            <img src="" alt="logo" class="img-fluid">
        </div>
        <ul class="list-group">
            <a class="list-group-item list-group-item-action" href="{{ route('admin') }}">Inicio</a>
            <a class="list-group-item list-group-item-action" href="">Usuarios</a>
            <a class="list-group-item list-group-item-action" href="">Productos</a>
            <a class="list-group-item list-group-item-action" href="">Inventario</a>
            <a class="list-group-item list-group-item-action" href="">Entradas</a>
            <a class="list-group-item list-group-item-action" href="{{ route('users') }}">Configuraciones</a>
        </ul>
    </menu>
    <main class="main">
        @yield('admin-content')
    </main>
    <footer class="footer bg-success text-white">
        Dat@Vet_ 2020
    </footer>
</main>
@endsection
