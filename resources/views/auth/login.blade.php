@extends('layouts.app')

@section('content')
<div class="row justify-content-center ">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="text-light">
                        Acceso | BancoApp 
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-6 bg-primary py-5 rounded">
                    <div class="col-md-12">
                        <div class="form-group text-right">
                            <a class="text-white font-weight-bold" href="{{ route('register') }}">Registrarse</a>
                        </div>
                    </div>
                    <form action="{{ route('check') }}" method="POST">
                        @csrf
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
