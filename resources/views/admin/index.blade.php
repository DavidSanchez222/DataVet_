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
                <select name="" id="" class="form-control col-sm-10"></select>
            </div>
        </div>
    </div>
@endsection
