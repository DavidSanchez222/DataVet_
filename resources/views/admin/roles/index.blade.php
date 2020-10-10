@extends('layouts.admin')

@section('admin-content')
    <div class="sticky-top bg-white">
        <div class="row justify-content-between align-items-center m-2">
            <h2 class="mb-0">Roles</h2>
            <div>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-secondary">Atras</a>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createRoleModal">Crear</button>
                <a href="{{ route('admin.settings.roles.index') }}" class="btn btn-sm btn-primary">Todo</a>
                <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
            </div>
        </div>
    </div>
    <form class="row m-2 bg-light filter collapse">
        <hr class="w-100">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Rol">
            </div>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-success">Filtrar</button>
        </div>
        <hr class="w-100">
    </form>
    <div class="table-responsive">
        <table class="table text-center table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Rol</th>
                    <th>Creado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $key => $role)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->created_at }}</td>
                        <td>
                            <button
                                id="{{ "editRole$role->id" }}"
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editRoleModal"
                                title="Editar"
                                data-role='@json($role)'
                                onclick="editRole('{{ $role->id }}', '{{ route('admin.settings.roles.update', $role->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showRole' . $role->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showRoleModal"
                                data-toggle="modal"
                                data-role='@json($role)'
                                onclick="showRole('{{ $role->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form
                                action="{{ route('admin.settings.roles.destroy', $role->id) }}" method="post"
                                id="{{ 'deleteRole' . $role->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('Role', '{{ $role->id }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">
            {{ $roles->links() }}
        </div>
    </div>
    @include('admin.roles.modals')
@endsection

@section('scripts-bottom')
    <script>
        function editRole(id, url) {
            let role = document.querySelector('#editRole' + id).dataset.role;
            role = JSON.parse(role);
            $('#editRole').attr('action', url);
            $('#name').val(role.name);
        }

        function showRole(id) {
            let role = document.querySelector('#showRole' + id).dataset.role;
            role = JSON.parse(role);
            $('#show_rol').text(role.name);
            $('#show_UpdatedAt').text(role.updated_at.split('.')[0].replace('T', ' '));
            $('#show_CreatedAt').text(role.created_at.split('.')[0].replace('T', ' '));
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#delete' + model + id).submit();
            }
        }
    </script>
@endsection
