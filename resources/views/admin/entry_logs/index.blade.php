@extends('layouts.admin')

@section('admin-content')
    <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
        <h2 class="mb-0">Entradas</h2>
        <div>
            <button class="btn btn-sm btn-primary">Filtrar</button>
        </div>
    </div>
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
                    <th colspan="2">Acciones</th>
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
        {{ $entry_logs->links() }}
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
