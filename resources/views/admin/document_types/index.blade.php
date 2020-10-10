@extends('layouts.admin')

@section('admin-content')
    <div class="sticky-top bg-white">
        <div class="col-sm-12 d-flex justify-content-between align-items-center my-2">
            <h2 class="mb-0">Tipos de Documento</h2>
            <div>
                <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-secondary">Atras</a>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createDocumentTypeModal">Crear</button>
                <a href="{{ route('admin.settings.document_types.index') }}" class="btn btn-sm btn-primary">Todo</a>
                <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
            </div>
        </div>
    </div>
    <form class="row m-2 bg-light filter collapse">
        <hr class="w-100">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="abbreviation" class="form-control form-control-sm" placeholder="abreviación">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="description" class="form-control form-control-sm" placeholder="Descipción">
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
                            <button
                                id="{{ "editDocumentType$document_type->id" }}"
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editDocumentTypeModal"
                                title="Editar"
                                data-document_type='@json($document_type)'
                                onclick="editDocumentType('{{ $document_type->id }}', '{{ route('admin.settings.document_types.update', $document_type->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showDocumentType' . $document_type->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showDocumentTypeModal"
                                data-toggle="modal"
                                data-document_type='@json($document_type)'
                                onclick="showDocumentType('{{ $document_type->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form
                                action="{{ route('admin.settings.document_types.destroy', $document_type->id) }}" method="post"
                                id="{{ 'deleteDocumentType' . $document_type->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('DocumentType', '{{ $document_type->id }}')"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row justify-content-center">
            {{ $document_types->links() }}
        </div>
    </div>
    @include('admin.document_types.modals')
@endsection

@section('scripts-bottom')
    <script>
        function editDocumentType(id, url) {
            let document_type = document.querySelector('#editDocumentType' + id).dataset.document_type;
            document_type = JSON.parse(document_type);
            $('#editDocumentType').attr('action', url);
            $('#abbreviation').val(document_type.abbreviation);
            $('#description').val(document_type.name);
        }

        function showDocumentType(id) {
            let document_type = document.querySelector('#showDocumentType' + id).dataset.document_type;
            document_type = JSON.parse(document_type);
            $('#show_abbreviation').text(document_type.abbreviation);
            $('#show_description').text(document_type.name);
            $('#show_UpdatedAt').text(document_type.updated_at.split('.')[0].replace('T', ' '));
            $('#show_CreatedAt').text(document_type.created_at.split('.')[0].replace('T', ' '));
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#delete' + model + id).submit();
            }
        }
    </script>
@endsection
