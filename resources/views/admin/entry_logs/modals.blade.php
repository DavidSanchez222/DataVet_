<div
    class="modal fade"
    id="editEntryLogModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editEntryLogModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editEntryLogModalTitle">Editar Entrada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editEntryLog">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="col-sm-6 pl-0">
                            <label for="purchase_order">Orden de Compra:</label>
                            <input type="text" name="purchase_order" class="form-control" placeholder="Orden de Compra" id="purchase_order">
                        </div>
                        <div class="col-sm-6 pr-0">
                            <label for="product">Producto:</label>
                            <select name="product" class="form-control" id="product">
                                <option value="0" disabled>Producto</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="col-sm-6 pl-0">
                            <label for="quantity">Cantidad:</label>
                            <input type="number" name="quantity" class="form-control" placeholder="Cantidad" id="quantity" min="1">
                        </div>
                        <div class="col-sm-6 pr-0">
                            <label for="product">Proveedor:</label>
                            <select name="provider" class="form-control" id="provider">
                                <option value="0" disabled>Proveedor</option>
                                @foreach ($providers as $providers)
                                    <option value="{{ $providers->id }}">{{ $providers->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-sm btn-success">Actualizar</button>
                </div>
                <input type="hidden" name="user" value="{{ Auth::user()->id }}">
            </form>
        </div>
    </div>
</div>
<div
    class="modal fade"
    id="showEntryLogModal"
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
                            <th>Orden de compra:</th>
                            <td id="showPurchase_order"></td>
                        </tr>
                        <tr>
                            <th>Producto:</th>
                            <td id="showProduct"></td>
                        </tr>
                        <tr>
                            <th>Cantidad:</th>
                            <td id="showQuantity"></td>
                        </tr>
                        <tr>
                            <th>Proveedor:</th>
                            <td id="showProvider"></td>
                        </tr>
                        <tr>
                            <th>Ultima actualización:</th>
                            <td id="showUpdatedAt"></td>
                        </tr>
                        <tr>
                            <th>Creado:</th>
                            <td id="showCreatedAt"></td>
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
