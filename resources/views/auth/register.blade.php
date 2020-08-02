@extends('layouts.app')

@section('content')
<div class="row justify-content-center ">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="text-light">
                        Registro | BancoApp 
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-6 bg-primary py-5 rounded">
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <a class="text-white font-weight-bold" href="{{ route('login') }}">Ya tengo una cuenta</a>
                        </div>
                    </div>
                    <form action="{{ route('store') }}" method="POST">
                        @csrf
                        <div class="col-md-12 mb-3">
                            <label for="validationTooltipUsername" class="text-white font-weight-bold">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required value="{{ old('nombre') }}">
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationTooltipUsername" class="text-white font-weight-bold">Apellidos</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="" required value="{{ old('apellidos') }}">
                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationTooltipUsername" class="text-white font-weight-bold">Correo electrónico</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@ejemplo.com" required value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationTooltipUsername" class="text-white font-weight-bold">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="" required value="{{ old('telefono') }}">
                                @error('telefono')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="validationTooltipUsername" class="text-white font-weight-bold">Contraseña</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="********" required value="{{ old('password') }}"> 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mt-4">
                            <button type="submit" class="btn btn-dark btn-block mt-4 py-3 font-weight-bold">Acceder</button>
                        </div>
                    </form>
                </div>
            </div>
@endsection
