@extends('layouts.admin')

@section('admin-content')
    <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
        <h2 class="mb-0">Usuarios</h2>
        <div>
            <button class="btn btn-sm btn-primary">Crear</button>
            <button class="btn btn-sm btn-primary">Filtrar</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center">
            <thead>
                <tr>
                    <th colspan="2">Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->document_type->abbreviation}}</td>
                        <td>{{$user->number_id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lastname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <form action="" method="post">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-sm btn-primary">Actualizar</button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('admin.users.modals')
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            $('#staticBackdrop').modal('show');
        });
    </script>
@endsection
