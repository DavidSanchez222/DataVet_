@extends('layouts.admin')

@section('admin-content')
    <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
        <h2 class="mb-0">Productos</h2>
        <div>
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createProductModal">Crear</button>
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
                    <th colspan="3">Acciones</th>
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
                            <button
                                id="{{ 'editProduct' . $product->id }}"
                                class="btn btn-sm btn-primary"
                                data-toggle="modal"
                                data-target="#editProductModal"
                                title="Editar"
                                data-product='@json($product)'
                                onclick="editProduct('{{ $product->id }}', '{{ route('admin.products.update', $product->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showProduct' . $product->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showProductModal"
                                data-toggle="modal"
                                data-product='@json($product)'
                                onclick="showProduct('{{ $product->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button></td>
                        <td>
                            <form action="{{ route('admin.products.delete', $product->id) }}"
                                method="post"
                                id="{{ 'deleteProduct' . $product->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('deleteProduct', '{{ $product->id }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    @include('admin.products.modals')
@endsection

@section('scripts-bottom')
    <script>
        function editProduct(id, url) {
            let product = document.querySelector('#editProduct' + id).dataset.product;
            product = JSON.parse(product);
            $('#editProduct').attr('action', url);
            $('#name').val(product.name);
            $('#categorie').val(product.categorie.id);
            $('#barcode').val(product.barcode);
            $('#price').val(product.price);
            $('#iva').val(product.iva);
            $('#description').val(product.description);
        }

        function showProduct(id) {
            let product = document.querySelector('#showProduct' + id).dataset.product;
            product = JSON.parse(product);
            console.log(product);
            $('#showProductModalTitle').text(product.name);
            $('#showBarcode').text(product.barcode);
            $('#showCategorie').text(product.categorie.name);
            $('#showPrice').text(product.price);
            $('#showIva').text(product.iva);
            $('#showUpdatedAt').text(product.updated_at.split('.')[0].replace('T', ' '));
            $('#showCreatedAt').text(product.created_at.split('.')[0].replace('T', ' '));
            $('#showDescription').text(product.description);
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
               $('#' + model + id).submit();
            }
        }
    </script>
@endsection
