@extends('layouts.app')

@section('content')
<menu class="menu">
    <ul>
        <li><a href="">Usuarios</a></li>
        <li><a href="">Productos</a></li>
        <li><a href="">Inventario</a></li>
        <li><a href="">Entradas</a></li>
        <li><a href="">Salidas</a></li>
        <li><a href=""></a></li>
    </ul>
</menu>
<main class="main">
    @yield('content2')
</main>
@endsection
