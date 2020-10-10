@extends('layouts.admin')

@section('admin-content')
    <div class="row justify-content-between align-items-center m-2">
        <h2 class="mb-0">Categorias</h2>
        <div>
            <a href="{{ route('admin.settings.index') }}" class="btn btn-sm btn-secondary">Atras</a>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createCategorieModal">Crear</button>
                <a href="{{ route('admin.settings.categories.index') }}" class="btn btn-sm btn-primary">Todo</a>
            <button class="btn btn-sm btn-primary" onclick="filter()">Filtro</button>
        </div>
    </div>
    <form class="row m-2 bg-light filter collapse">
        <hr class="w-100">
        <div class="col-sm-3">
            <div class="form-group">
                <input type="text" name="name" class="form-control form-control-sm" placeholder="Categoria">
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
                    <th>categoria</th>
                    <th>Creado</th>
                    <th colspan="2">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $categorie)
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td>{{ $categorie->name }}</td>
                        <td>{{ $categorie->created_at }}</td>
                        <td>
                            <button
                                id="{{ "editCategorie$categorie->id" }}"
                                class="btn btn-sm btn-warning"
                                data-toggle="modal"
                                data-target="#editCategorieModal"
                                title="Editar"
                                data-categorie='@json($categorie)'
                                onclick="editCategorie('{{ $categorie->id }}', '{{ route('admin.settings.categories.update', $categorie->id) }}')"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button
                                id="{{ 'showCategorie' . $categorie->id }}"
                                class="btn btn-sm btn-primary"
                                data-target="#showCategorieModal"
                                data-toggle="modal"
                                data-categorie='@json($categorie)'
                                onclick="showCategorie('{{ $categorie->id }}')"
                                title="Ver"
                            >
                                <i class="fas fa-eye"></i>
                            </button>
                        </td>
                        <td>
                            <form
                                action="{{ route('admin.settings.categories.destroy', $categorie->id) }}" method="post"
                                id="{{ 'deleteCategorie' . $categorie->id }}"
                            >
                                @method('DELETE')
                                @csrf
                                <button
                                    type="button"
                                    class="btn btn-sm btn-danger"
                                    title="Eliminar"
                                    onclick="confirmDeletion('Categorie', '{{ $categorie->id }}')"
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
            {{ $categories->links() }}
        </div>
    </div>
    @include('admin.categories.modals')
@endsection

@section('scripts-bottom')
    <script>
        function editCategorie(id, url) {
            let categorie = document.querySelector('#editCategorie' + id).dataset.categorie;
            categorie = JSON.parse(categorie);
            $('#editCategorie').attr('action', url);
            $('#name').val(categorie.name);
        }

        function showCategorie(id) {
            let categorie = document.querySelector('#showCategorie' + id).dataset.categorie;
            categorie = JSON.parse(categorie);
            $('#show_name').text(categorie.name);
            $('#show_UpdatedAt').text(categorie.updated_at.split('.')[0].replace('T', ' '));
            $('#show_CreatedAt').text(categorie.created_at.split('.')[0].replace('T', ' '));
        }

        function confirmDeletion(model, id) {
            if(confirm('¿Estás seguro de eliminar este registro?')) {
                $('#delete' + model + id).submit();
            }
        }
    </script>
@endsection
