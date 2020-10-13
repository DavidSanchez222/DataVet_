<div class="modal fade" id="createRoleModal" tabindex="-1" role="dialog" aria-labelledby="createRoleModalTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createRoleModalTitle">Crear Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.settings.roles.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Rol" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-sm btn-success">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="editRoleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editRoleModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editRoleModalTitle">Editar Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editRole">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Rol</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Rol" required>
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
    id="showRoleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="showRoleModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="showRoleModalTitle">Ver Rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-sm">
                    <tbody>
                        <tr>
                            <th>Rol:</th>
                            <td id="show_rol"></td>
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
