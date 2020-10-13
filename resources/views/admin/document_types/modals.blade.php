<div class="modal fade" id="createDocumentTypeModal" tabindex="-1" role="dialog" aria-labelledby="createDocumentTypeModalTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createDocumentTypeModalTitle">Crear Tipo de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.settings.document_types.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input type="text" name="abbreviation" class="form-control" placeholder="Abreviación" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" cols="30" rows="5"  required></textarea>
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
    id="editDocumentTypeModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editDocumentTypeModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editDocumentTypeModalTitle">Editar Tipo de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editDocumentType">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Abreviación</label>
                                <input type="text" name="abbreviation" id="abbreviation" class="form-control" placeholder="Abreviación" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="description">Descripción</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5"  required></textarea>
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
    id="showDocumentTypeModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="showDocumentTypeModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="showDocumentTypeModalTitle">Ver Tipo de Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-sm">
                    <tbody>
                        <tr>
                            <th>Abreviación:</th>
                            <td id="show_abbreviation"></td>
                        </tr>
                        <tr>
                            <th>Descripción:</th>
                            <td id="show_description"></td>
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
