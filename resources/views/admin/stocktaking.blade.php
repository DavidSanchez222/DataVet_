@extends('layouts.admin')

@section('admin-content')
    <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
        <h2 class="mb-0">Inventario</h2>
        <div>
            <button class="btn btn-sm btn-primary">Filtrar</button>
        </div>
    </div>
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
