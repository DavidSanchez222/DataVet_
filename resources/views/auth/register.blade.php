@extends('layouts.admin')

@section('admin-content')
<div class="container text-center">
    <h3 class="mt-3 mb-5">Crear Usuario</h3>
    <form class="d-flex flex-column align-items-center" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
            <div class="col-lg-4 mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombres">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-lg-4 mb-3">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Apellidos">

                @error('lastname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus placeholder="Apodo">

                @error('nickname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
            <div class="col-md-4 mb-3">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Teléfono">

                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2 mb-3">
                <select class="form-control @error('document_type') is-invalid @enderror" name="document_type" id="document_type" required autofocus>
                    <option value="0" selected disabled>Tipo de Documento</option>
                    @foreach ($document_types as $document_type)
                        <option value="{!! $document_type->id !!}">{!! $document_type->abbreviation !!} - {!! $document_type->name !!}</option>
                    @endforeach
                </select>

                @error('document_type')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <input id="number_id" type="text" class="form-control @error('number_id') is-invalid @enderror" name="number_id" value="{{ old('number_id') }}" required autocomplete="number_id" autofocus placeholder="Numero Documento de Identidad">

                @error('number_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-2 mb-3">
                <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required autofocus>
                    <option value="0" selected disabled>Rol</option>
                    @foreach ($roles as $role)
                        <option value="{!! $role->id !!}">{!! $role->name !!}</option>
                    @endforeach
                </select>

                @error('role')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
        </div>
        <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
                    <div class="col-md-4 mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            <div class="col-md-4 mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-4 mb-3">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme la Contraseña">
            </div>
        </div>
        <div class="col-md-10 mt-5">
            <a class="btn btn-sm btn-secondary"href="{{ url()->previous() }}">Atras</a>
            <button type="submit" class="btn btn-sm btn-primary">Crear</button>
        </div>
    </form>
</div>
@endsection
