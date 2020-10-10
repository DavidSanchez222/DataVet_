@extends('layouts.admin')

@section('admin-content')
    <div class="row justify-content-between align-items-center m-2">
        <h2 class="mb-0">Usuarios</h2>
        <div>
            <a class="btn btn-sm btn-secondary"href="{{ route('admin.settings.index') }}">Atras</a>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.settings.users.create') }}">Crear</a>
            <a href="{{ route('admin.settings.users.index') }}" class="btn btn-sm btn-primary">Todo</a>
            <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
        </div>
    </div>
    <form class="row m-2 bg-light filter collapse">
        <hr class="w-100">
        <div class="col-sm-3">
            <div class="form-group">
                <select name="document_type" class="form-control form-control-sm">
                    <option value="0" selected disabled>Tipo de documento</option>
                    @foreach ($document_types as $document_type)
                        <option value="{{ $document_type->id }}">{{ "$document_type->abbreviation - $document_type->name" }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="number_id" class="form-control form-control-sm" placeholder="Número de documento">
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
                    <th>Rol</th>
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
                        <td>{{ $user->role->name }}</td>
                        <td>
                            <button
                                id="{{ 'editUser' . $user->id }}"
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editUserModal"
                                title="Editar"
                                data-user='@json($user)'
                                onclick="editUser('{{ $user->id }}', '{{ route('admin.settings.users.update', $user->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showUser' . $user->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showUserModal"
                                data-toggle="modal"
                                data-user='@json($user)'
                                onclick="showUser('{{ $user->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form
                                action="{{ route('admin.settings.users.destroy', $user->id) }}" method="post"
                                id="{{ 'deleteUser' . $user->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('User', '{{ $user->id }}')"
                                >
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
        function editUser(id, url) {
            let user = document.querySelector('#editUser' + id).dataset.user;
            user = JSON.parse(user);
            $('#editUser').attr('action', url);
            $('#name').val(user.name);
            $('#lastname').val(user.lastname);
            $('#nickname').val(user.nickname);
            $('#document_type_id').val(user.document_type_id);
            $('#number_id').val(user.number_id);
            $('#phone').val(user.phone);
            $('#email').val(user.email);
            $('#role_id').val(user.role.id);
        }

        function showUser(id) {
            let user = document.querySelector('#showUser' + id).dataset.user;
            user = JSON.parse(user);
            $('#show_document').text(user.document_type.abbreviation + ' ' + user.number_id);
            $('#show_names').text(user.name + ' ' + user.lastname);
            $('#show_email').text(user.email);
            $('#show_nickname').text(user.nickname);
            $('#show_phone').text(user.phone);
            $('#show_role').text(user.role.name);
            $('#show_UpdatedAt').text(user.updated_at.split('.')[0].replace('T', ' '));
            $('#show_CreatedAt').text(user.created_at.split('.')[0].replace('T', ' '));
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#delete' + model + id).submit();
            }
        }
    </script>
@endsection
