@extends('layouts.app')

@section('content')
<div class="row justify-content-center ">
                <div class="col-12 col-md-6 text-center">
                    <h2 class="text-light">
                        Home | BancoWeb 
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center py-5">
                <div class="col-12 col-md-6 bg-primary py-5 rounded">
                    
                    @if($user->count() > 0)
                        @foreach($user as $data)
                            <form action="{{ route('storeData') }}" method="POST" id="formulario">
                                <div class="col-md-12 mb-5 text-center">
                                    <h2 class="text-white">
                                        {{ Auth::guard('web')->user()->email }}
                                    </h2>
                                </div>
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltipUsername" class="text-white font-weight-bold">IBAN</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                                        </div>
                                        @if($data->iban != NULL)
                                        <input type="text" class="form-control" id="iban" name="iban" placeholder="" required value="{{ $data->iban }}">
                                        @else
                                        <input type="text" class="form-control" id="iban" name="iban" placeholder="" required value="{{ old('iban') }}">
                                        @endif
                                        
                                        
                                    </div>
                                    <span class="mensajeIbanError text-white d-none" role="alert">
                                        
                                    </span>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltipUsername" class="text-white font-weight-bold">Dirección de facturación</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-sign"></i></span>
                                        </div>
                                        @if($data->direccion_facturacion != NULL)
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="{{ $data->direccion_facturacion }}">
                                        @else
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="" value="{{ old('direccion') }}">
                                        @endif
                                        
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationTooltipUsername" class="text-white font-weight-bold">DNI</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-id-card"></i></span>
                                        </div>
                                        @if($data->dni != NULL)
                                        <input type="text" class="form-control" id="dni" name="dni" placeholder="" required value="{{ $data->dni }}">
                                        @else
                                        <input type="text" class="form-control" id="dni" name="dni" placeholder="" required value="{{ old('dni') }}">
                                        @endif
                                        
                                    </div>
                                    <span class="mensajeDniError text-white d-none" role="alert">
                                        
                                    </span>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-dark btn-block mt-4 py-3 font-weight-bold" id="guardarDatos">Guardar datos</button>
                                </div>
                            </form>
                        @endforeach
                    @endif
                </div>
            </div>

@endsection
