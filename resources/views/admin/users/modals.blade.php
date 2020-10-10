<div
    class="modal fade"
    id="editUserModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editUserModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editUserModalTitle">Editar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editUser">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="name">Nombres</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombres">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="lastname">Apellidos</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nickname">Nickname</label>
                                <input type="text" name="nickname" id="nickname" class="form-control" placeholder="Nickname">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="document_type_id">Tipo Documento</label>
                                <select name="document_type_id" id="document_type_id" class="form-control">
                                    @foreach ($document_types as $document_type)
                                        <option value="{{ $document_type->id }}">{{ "$document_type->abbreviation - $document_type->name" }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="number_id">Número Documento</label>
                                <input type="number" name="number_id" id="number_id" class="form-control" placeholder="Número Documento">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="phone">Teléfono</label>
                                <input type="number" name="phone" id="phone" class="form-control" placeholder="Teléfono">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="role_id">Rol</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="showUserModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="showUserModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="showUserModalTitle">Ver Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-sm">
                    <tbody>
                        <tr>
                            <th>Documento:</th>
                            <td id="show_document"></td>
                        </tr>
                        <tr>
                            <th>Nombre:</th>
                            <td id="show_names"></td>
                        </tr>
                        <tr>
                            <th>Nickname:</th>
                            <td id="show_nickname"></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td id="show_email"></td>
                        </tr>
                        <tr>
                            <th>Teléfono</th>
                            <td id="show_phone"></td>
                        </tr>
                        <tr>
                            <th>Rol</th>
                            <td id="show_role"></td>
                        </tr>
                        <tr>
                            <th>Ultima actualización:</th>
                            <td id="show_UpdatedAt"></td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td id="show_CreatedAt"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

