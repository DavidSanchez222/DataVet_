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
                                    <span class="caret">{{ Auth::user()->nickname }}</span>
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
    <menu class="menu border-right border-success">
        <div class="card border-success rounded-circle bg-white m-3">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="img-fluid text-success">
        </div>
        <ul class="list-group rounded-0">
            {{-- {{ Request::path() }} --}}
            <a class="list-group-item list-group-item-action list-group-item-success {{ Request::path() == 'admin' ? 'active' : '' }}" href="{{ route('admin.') }}">Inicio</a>
            <a class="list-group-item list-group-item-action list-group-item-success {{ Request::path() == 'admin/products' ? 'active' : '' }}" href="{{ route('admin.products.index') }}">Productos</a>
            <a class="list-group-item list-group-item-action list-group-item-success {{ Request::path() == 'admin/entry_logs' ? 'active' : '' }}" href="{{ route('admin.entry_logs.index') }}">Entradas</a>
            <a class="list-group-item list-group-item-action list-group-item-success {{ Request::path() == 'admin/checkouts' ? 'active' : '' }}" href="{{ route('admin.checkouts.index') }}">Salidas</a>
            <a class="list-group-item list-group-item-action list-group-item-success {{ Request::path() == 'admin/stocktaking' ? 'active' : '' }}" href="{{ route('admin.stocktaking') }}">Inventario</a>
            <a class="list-group-item list-group-item-action list-group-item-success {{ strpos(Request::path(), 'settings') !== false ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">Configuraciones</a>
        </ul>
    </menu>
    <main class="main">
        @include('flash-message')
        @yield('admin-content')
    </main>
    <footer class="footer bg-success text-white text-center">
        Copyright © 2020 - Dat@_Vet
    </footer>
</main>
@endsection
