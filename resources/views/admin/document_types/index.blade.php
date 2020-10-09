@extends('layouts.admin')

@section('admin-content')
    <div class="sticky-top bg-white">
        <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
            <h2 class="mb-0">Tipos de Documento</h2>
            <div>
                <button class="btn btn-sm btn-primary">Crear</button>
                <button class="btn btn-sm btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Abreviación</th>
                    <th>Descripcion</th>
                    <th>Creado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($document_types as $key => $document_type)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $document_type->abbreviation }}</td>
                        <td>{{ $document_type->name }}</td>
                        <td>{{ $document_type->created_at }}</td>
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
        {{ $document_types->links() }}
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
