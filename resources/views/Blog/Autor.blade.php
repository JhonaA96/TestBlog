<!-- Importamos de la app layout -->
@extends('layouts.app')


<!-- Agregamos Botones -->
@section('botones')
    <a href=" {{ route('Blog.Blog') }} " class="btn btn-primary mr-2 text-white">Regresar</a>
@endsection

<!-- Agregamos Contenido de la Db -->
@section('content')
    <h2 class="text-center mb-5">Dinos quien eres</h2>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

        <!-- Creación del formulario -->
            <form action="{{route ('Autor.Store')}}" enctype="multipart/form-data" method="post" novalidate>
                @csrf
                 <!-- Titulo del Blog -->
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

                <!-- Autor Del blog -->
                <div class="form-group mt-3">
                    <label for="apellidos">Apellidos</label>
                    <input type="text" 
                        name="apellidos" 
                        class="form-control @error('apellidos') is-invalid @enderror" 
                        id="titulo" 
                        placeholder="Apellidos del autor"
                        value="{{old('apellidos')}}"
                    />
                    @error('apellidos')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                
                <!-- Guardar Blog -->
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" value="Agregar Autor">
                    
                    
                </div>


            </form>
        </div>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous"></script>
@endsection

@endsection