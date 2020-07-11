@extends('layouts.app')

@section('content')
<main class="auth">
    <div class="container text-center">
        <h1>Warehouse</h1>
        <h3>{{ __('Register') }}</h3>
        <form class="d-flex flex-column align-items-center" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
                <div class="col-lg-6 mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombres">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus placeholder="Apellidos">

                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
                <div class="col-md-6 mb-3">
                    <input id="nickname" type="text" class="form-control @error('nickname') is-invalid @enderror" name="nickname" value="{{ old('nickname') }}" required autocomplete="nickname" autofocus placeholder="Apodo">

                    @error('nickname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Teléfono">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
                <div class="col-md-3 mb-3">
                    <select class="form-control" name="type_document" id="type_document" required autofocus>
                        @foreach ($type_documents as $type_document)
                            <option value="{!! $type_document->id !!}">{!! $type_document->abbreviation !!}</option>
                        @endforeach
                    </select>

                    @error('type_document')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-9 mb-3">
                    <input id="number_id" type="text" class="form-control @error('number_id') is-invalid @enderror" name="number_id" value="{{ old('number_id') }}" required autocomplete="number_id" autofocus placeholder="Numero Documento de Identidad">

                    @error('number_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
                <div class="col-md-12 mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electrónico">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 d-flex flex-column flex-lg-row p-md-0">
                <div class="col-md-6 mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme la Contraseña">
                </div>
            </div>
            <div class="col-md-10 mb-3">
                <button type="submit" class="btn btn-primary">
                    Registrarme
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
