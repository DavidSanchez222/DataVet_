<div class="modal fade" id="createProductModal" tabindex="-1" role="dialog" aria-labelledby="createProductModalTitle" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="createProductModalTitle">Crear Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.products.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="col-sm-8 pl-0">
                            <input type="text" name="name" class="form-control" placeholder="Nombre del producto" required>
                        </div>
                        <div class="col-sm-4 pr-0">
                            <select name="categorie" class="form-control" required>
                                <option value="0" disabled selected>Categoria</option>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="form-group">
                            <input type="text" name="barcode" class="form-control" placeholder="Código de barras" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Precio" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="iva" class="form-control" placeholder="IVA" required>
                        </div>
                    </div>
                    <div class="col-sm-12 my-2">
                        <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Descripción" required></textarea>
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
    id="editProductModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editProductModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editProductModalTitle">Editar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editProduct">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="col-sm-8 pl-0">
                            <input type="text" name="name" class="form-control" placeholder="Nombre del producto" id="name" required>
                        </div>
                        <div class="col-sm-4 pr-0">
                            <select name="categorie" class="form-control" id="categorie" required>
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="form-group">
                            <input type="text" name="barcode" class="form-control" placeholder="Código de barras" id="barcode" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="price" class="form-control" placeholder="Precio" id="price" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="iva" class="form-control" placeholder="IVA" id="iva" required>
                        </div>
                    </div>
                    <div class="col-sm-12 my-2">
                        <textarea name="description" class="form-control" cols="30" rows="5" id="description" placeholder="Descripción" required></textarea>
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
    id="showProductModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="showProductModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="showProductModalTitle">Ver Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-sm">
                    <tbody>
                        <tr>
                            <th>Codigo de barras:</th>
                            <td id="showBarcode"></td>
                        </tr>
                        <tr>
                            <th>Categoria:</th>
                            <td id="showCategorie"></td>
                        </tr>
                        <tr>
                            <th>Precio:</th>
                            <td id="showPrice"></td>
                        </tr>
                        <tr>
                            <th>IVA:</th>
                            <td id="showIva"></td>
                        </tr>
                        <tr>
                            <th>Ultima actualización:</th>
                            <td id="showUpdatedAt"></td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td id="showCreatedAt"></td>
                        </tr>
                        <tr>
                            <th>Descripcion:</th>
                            <td id="showDescription"></td>
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
