@extends('layouts.admin')

@section('admin-content')
    <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
        <h2 class="mb-0">Productos</h2>
        <div>
            <button class="btn btn-sm btn-primary">Crear</button>
            <button class="btn btn-sm btn-primary">Filtrar</button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Producto</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>Categoria</th>
                    <th>Creado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $key => $product)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $product->name }}</td>
                        <td class="text-justify">{{ $product->description }}</td>
                        <td>{{ '$' . number_format($product->price) }}</td>
                        <td>{{ $product->iva . '%' }}</td>
                        <td>{{ $product->categorie->name }}</td>
                        <td>{{ $product->created_at }}</td>
                        <td>
                            <form action="" method="post">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                            </form>
                        </td>
                        <td>
                            <form action="" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    {{-- @include('admin.users.modals') --}}
@endsection

@section('scripts')
    {{-- <script>
        $(document).ready(() => {
            $('#staticBackdrop').modal('show');
        });
    </script> --}}
@endsection
