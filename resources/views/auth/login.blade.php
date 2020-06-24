@extends('layouts.app')

@section('content')
<div class="menu main container border border-danger">
    <div class="col-12 col-sm-4 mx-auto border border-success text-center my-5 p-5">
        <h1 class="mb-5">Login</h1>
        <form class="form-group" action="" method="POST">
            <input class="form-control form-control-sm mb-3" type="email" name="email" placeholder="Ingresa tu email">
            <input class="form-control form-control-sm mb-5" type="password" name="password" placeholder="Ingresa tu contraseña">
            <button class="btn btn-sm btn-primary" type="submit">Ingresar</button>
        </form>
    </div>
</div>
@endsection
