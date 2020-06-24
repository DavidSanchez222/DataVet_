@extends('dashboard.index')

@section('content2')
    <div class="col-sm-12 d-flex justify-content-between align-items-center">
        <h2 class="mb-0">Usuarios</h2>
        <div>
            <button class="btn btn-sm btn-primary">Crear</button>
            <button class="btn btn-sm btn-primary">Filtrar</button>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table">
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
                            <td>{{$user->type_documents_id}}</td>
                            <td>{{$user->numero_identificacion}}</td>
                            <td>{{$user->nombre}}</td>
                            <td>{{$user->apellido}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->teléfono_celular}}</td>
                            <td><button class="btn btn-sm btn-primary">Actualizar</button></td>
                            <td><button class="btn btn-sm btn-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @include('dashboard.users.modals')
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            $('#staticBackdrop').modal('show');
        });
    </script>
@endsection
