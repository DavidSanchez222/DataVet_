@extends('layouts.admin')

@section('admin-content')
    <div class="row justify-content-between align-items-center m-2">
        <h2 class="mb-0">Inventario</h2>
        <div>
            <a class="btn btn-sm btn-primary"href="{{ route('admin.stocktaking') }}">Todo</a>
            <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
        </div>
    </div>
    <form class="row m-2 bg-light filter collapse">
        <hr class="w-100">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="name" placeholder="Nombre de producto" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-success">Filtrar</button>
        </div>
        <hr class="w-100">
    </form>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Productos</th>
                    <th>Entradas</th>
                    <th>Salidas</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <th>{{ $index + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $entryLogs[$product->id] }}</td>
                        <td>{{ $checkouts[$product->id] }}</td>
                        <td>{{ $entryLogs[$product->id] - $checkouts[$product->id] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
