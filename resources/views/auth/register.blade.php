@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('Autor.Create') }}">
                        @csrf

                        <div class="form-group mt-3">
                            <label for="nombre">Nombre</label>
                            <input type="text" 
                                name="nombre" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                id="nombre" 
                                placeholder="Nombre del autor"
                                value="{{old('nombre')}}"
                            />
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <label for="apellido">Apellido</label>
                            <input type="text" 
                                name="apellido" 
                                class="form-control @error('apellido') is-invalid @enderror" 
                                id="apellido" 
                                placeholder="Apellido del autor"
                                value="{{old('apellido')}}"
                            />
                            @error('apellido')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
