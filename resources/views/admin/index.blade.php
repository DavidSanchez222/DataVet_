@extends('layouts.admin')

@section('admin-content')
    <div class="row m-2">
        <h2>Registro de Entrada</h2>
    </div>
    <div class="row m-2">
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Orden de compra:</label>
                <input type="text" name="" class="form-control col-sm-8">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Proveedor:</label>
                <select name="" id="" class="form-control col-sm-9"></select>
                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio unitario</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <select name="" id="" class="form-control form-control-sm">
                            <option value="">Seleccione uno</option>
                        </select>
                    </td>
                    <td>....</td>
                    <td><input type="number" name="" id="" class="form-control form-control-sm"></td>
                    <td>....</td>
                    <td><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button></td>
                </tr>
            </tbody>
        </table>
        <table>
            <thead>
                <tr>
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
