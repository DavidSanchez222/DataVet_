@extends('layouts.admin')

@section('admin-content')
    <div class="row justify-content-between align-items-center m-2">
        <h2 class="mb-0">Entradas</h2>
        <div>
            <a class="btn btn-sm btn-primary" href="{{ route('admin.entry_logs.index') }}">Todos</a>
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
                <input type="text" name="purchase_order" placeholder="Orden de compra" class="form-control form-control-sm">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="provider" placeholder="Proveedor" class="form-control form-control-sm">
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
                    <th>Orden Compra</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Proveedor</th>
                    <th>Registrado por</th>
                    <th>Fecha Registro</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entry_logs as $key => $entry_log)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $entry_log->purchase_order }}</td>
                        <td>{{ $entry_log->product->name }}</td>
                        <td>{{ $entry_log->quantity }}</td>
                        <td>{{ $entry_log->provider->name }}</td>
                        <td>{{ $entry_log->user->name }}</td>
                        <td>{{ $entry_log->created_at }}</td>
                        <td>
                            <button
                                id="{{ 'editEntryLog' . $entry_log->id }}"
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editEntryLogModal"
                                title="Editar"
                                data-entry_log='@json($entry_log)'
                                onclick="editEntryLog('{{ $entry_log->id }}', '{{ route('admin.entry_logs.update', $entry_log->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showEntryLog' . $entry_log->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showEntryLogModal"
                                data-toggle="modal"
                                data-entry_log='@json($entry_log)'
                                onclick="showEntryLog('{{ $entry_log->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form
                                action="{{ route('admin.entry_logs.destroy', $entry_log->id) }}" method="post"
                                id="{{ 'deleteEntryLog' . $entry_log->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('deleteEntryLog', '{{ $entry_log->id }}')"
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
            {{ $entry_logs->links() }}
        </div>
    </div>
    @include('admin.entry_logs.modals')
@endsection

@section('scripts-bottom')
    <script>
        function editEntryLog(id, url) {
            let entry_log = document.querySelector('#editEntryLog' + id).dataset.entry_log;
            entry_log = JSON.parse(entry_log);
            $('#editEntryLog').attr('action', url);
            $('#purchase_order').val(entry_log.purchase_order);
            $('#product').val(entry_log.product.id);
            $('#quantity').val(entry_log.quantity);
            $('#provider').val(entry_log.provider.id);
        }

        function showEntryLog(id) {
            let entry_log = document.querySelector('#showEntryLog' + id).dataset.entry_log;
            entry_log = JSON.parse(entry_log);
            $('#showPurchaseOrder').text(entry_log.purchase_order);
            $('#showProduct').text(entry_log.product.name);
            $('#showQuantity').text(entry_log.quantity);
            $('#showProvider').text(entry_log.provider.name);
            $('#showUser').text(entry_log.user.name);
            $('#showUpdatedAt').text(entry_log.updated_at.split('.')[0].replace('T', ' '));
            $('#showCreatedAt').text(entry_log.created_at.split('.')[0].replace('T', ' '));
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#' + model + id).submit();
            }
        }
    </script>
@endsection
