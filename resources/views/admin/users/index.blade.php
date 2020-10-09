@extends('layouts.admin')

@section('admin-content')
    <div class="sticky-top bg-white">
        <div class="row justify-content-between align-items-center m-2">
            <h2 class="mb-0">Usuarios</h2>
            <div>
                <a class="btn btn-sm btn-secondary"href="{{ route('admin.settings.index') }}">Atras</a>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.settings.users.create') }}">Crear</a>
                <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
            </div>
        </div>
        <form class="row m-2 bg-light filter collapse">
            <hr class="w-100">
            <div class="col-sm-3">
                <div class="form-group">
                    <select name="type_document" class="form-control form-control-sm">
                        <option value="0">Tipo de documento</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" name="document_number" class="form-control form-control-sm" placeholder="Número de documento">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Nombre o apellido" class="form-control form-control-sm">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" name="email" class="form-control form-control-sm" placeholder="Email">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="number" name="phone" class="form-control form-control-sm" placeholder="Teléfono">
                </div>
            </div>
            <div class="col-sm-3">
                <button type="submit" class="btn btn-sm btn-success">Filtrar</button>
            </div>
            <hr class="w-100">
        </form>
    </div>
    <div class="table-responsive">
        <table class="table text-center table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th colspan="2">Documento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $user->document_type->abbreviation }}</td>
                        <td>{{ $user->number_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <form action="" method="post">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.settings.users.destroy', $user->id) }}" method="post" id="deleteUser{{ $user->id }}">
                                @method('DELETE')
                                @csrf
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion('User', '{{ $user->id }}')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center mx-2">
            {{ $users->links() }}
        </div>
    </div>
    @include('admin.users.modals')
@endsection

@section('scripts-bottom')
    <script>
        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#delete' + model + id).submit();
            }
        }
    </script>
@endsection
