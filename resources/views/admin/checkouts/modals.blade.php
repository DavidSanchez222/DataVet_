<div
    class="modal fade"
    id="editCheckoutModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="editCheckoutModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="editCheckoutModalTitle">Editar Salida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="editCheckout">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="col-sm-12 d-flex justify-content-between my-2">
                        <div class="col-sm-6 pl-0">
                            <label for="invoice_number">Factura:</label>
                            <input type="text" name="invoice_number" class="form-control" placeholder="Factura" id="invoice_number">
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
    id="showCheckoutModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="showCheckoutModalTitle"
    aria-hidden="true"
    data-backdrop="static"
>
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="showCheckoutModalTitle">Ver Salida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-hover table-sm">
                    <tbody>
                        <tr>
                            <th>Factura:</th>
                            <td id="showInvoiceNumber"></td>
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
                            <th>Registrado por:</th>
                            <td id="showUser"></td>
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
