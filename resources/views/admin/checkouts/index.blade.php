@extends('layouts.admin')

@section('admin-content')
    <div class="row justify-content-between align-items-center m-2">
        <h2 class="mb-0">Salidas</h2>
        <div>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.checkouts.index') }}">Todos</a>
            <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
        </div>
    </div>
    <form class="row m-2 bg-light filter collapse">
        <hr class="w-100">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="product" placeholder="Nombre de producto" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="invoice_number" placeholder="Factura" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="user" placeholder="Registrado por" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="date" name="created_at" placeholder="Fecha Registro" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-3">
            <button type="submit" class="btn btn-sm btn-success">Filtrar</button>
        </div>
        <hr class="w-100">
    </form>
    <div class="table-responsive">
        <table class="table text-center table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Factura</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Registrado por</th>
                    <th>Fecha Registro</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($checkouts as $key => $checkout)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $checkout->invoice_number }}</td>
                        <td>{{ $checkout->product->name }}</td>
                        <td>{{ $checkout->quantity }}</td>
                        <td>{{ $checkout->user->name }}</td>
                        <td>{{ $checkout->created_at }}</td>
                        <td>
                            <button
                                id="{{ 'editCheckout' . $checkout->id }}"
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editCheckoutModal"
                                title="Editar"
                                data-checkout='@json($checkout)'
                                onclick="editCheckout('{{ $checkout->id }}', '{{ route('admin.checkouts.update', $checkout->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showCheckout' . $checkout->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showCheckoutModal"
                                data-toggle="modal"
                                data-checkout='@json($checkout)'
                                onclick="showCheckout('{{ $checkout->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form
                                action="{{ route('admin.checkouts.destroy', $checkout->id) }}" method="post"
                                id="{{ 'deleteCheckout' . $checkout->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('deleteCheckout', '{{ $checkout->id }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center mx-2">
            {{ $checkouts->links() }}
        </div>
    </div>
    @include('admin.checkouts.modals')
@endsection

@section('scripts-bottom')
    <script>
        function editCheckout(id, url) {
            let checkout = document.querySelector('#editCheckout' + id).dataset.checkout;
            checkout = JSON.parse(checkout);
            $('#editCheckout').attr('action', url);
            $('#invoice_number').val(checkout.invoice_number);
            $('#product').val(checkout.product.id);
            $('#quantity').val(checkout.quantity);
        }

        function showCheckout(id) {
            let checkout = document.querySelector('#showCheckout' + id).dataset.checkout;
            checkout = JSON.parse(checkout);
            $('#showInvoiceNumber').text(checkout.invoice_number);
            $('#showProduct').text(checkout.product.name);
            $('#showQuantity').text(checkout.quantity);
            $('#showUser').text(checkout.user.name);
            $('#showUpdatedAt').text(checkout.updated_at.split('.')[0].replace('T', ' '));
            $('#showCreatedAt').text(checkout.created_at.split('.')[0].replace('T', ' '));
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#' + model + id).submit();
            }
        }
    </script>
@endsection
