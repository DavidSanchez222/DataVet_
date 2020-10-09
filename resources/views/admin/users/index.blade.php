@extends('layouts.admin')

@section('admin-content')
    <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
        <h2 class="mb-0">Usuarios</h2>
        <div>
            <a class="btn btn-sm btn-primary" href="{{ route('settings.users.create') }}">Crear</a>
            <button class="btn btn-sm btn-primary">Filtrar</button>
        </div>
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
                            <form action="{{ route('settings.users.destroy', $user->id) }}" method="post" id="deleteUser{{ $user->id }}">
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
        {{ $users->links() }}
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
