<!-- Importamos de la app layout -->
@extends('layouts.app')

<!-- Cargando trix editor -->

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css" integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg==" crossorigin="anonymous" />
@endsection

<!-- Agregamos Botones -->
@section('botones')
    <a href=" {{ route('Blog.Blog') }} " class="btn btn-primary mr-2 text-white">Regresar</a>
@endsection

<!-- Agregamos Contenido de la Db -->
@section('content')
    <h2 class="text-center mb-5">Edita tu Blog: {{$Post->titulo}}</h2>

    

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">

        <!-- Creación del formulario -->
        <form action="{{route ('Blog.Update', ['post' => $Post->id])}}" enctype="multipart/form-data" method="post" novalidate>
                @csrf
                @method('PUT')
                 <!-- Titulo del Blog -->
                <div class="form-group mt-3">
                    <label for="titulo">Titulo Blog</label>
                    <input type="text" 
                        name="titulo" 
                        class="form-control @error('titulo') is-invalid @enderror" 
                        id="titulo" 
                        placeholder="Titulo del Blog"
                        value="{{$Post->titulo}}"
                    />
                    @error('titulo')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Autor Del blog -->
                <div class="form-group mt-3">
                    <label for="autor">Autor</label>
                    <select 
                        name="autor" 
                        class="form-control @error('autor') is-invalid @enderror" 
                        id="autor" 
                        placeholder="Nombre del autor"
                        value="{{old('autor')}}"
                    >
                        <option value="" disabled selected>--Seleccione--</option>
                        @foreach($autor as $autor)
                            <option value="{{$autor->id}}"
                                    {{ $Post->id_autor == $autor->id ? 'selected' : '' }}     
                            > {{$autor->nombre_completo}}</option>
                        @endforeach
                    </select>
                    @error('autor')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <!-- Contenido del Blog -->
                <div class="form-group mt-4">
                    <label for="contenido">Contenido</label>
                    <input type="hidden" id="contenido" name="contenido" value="{{$Post->contenido}}">
                    <trix-editor input = "contenido"></trix-editor>

                    @error('contenido')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Inagen del blog -->
                <div class="form-group mt-3">
                    <label for="titulo">Inserte una imagen</label>
                    <input type="file" 
                        id="imagen" 
                        class="form-control  @error('imagen') is-invalid @enderror"
                        name="imagen"/>

                    <div class="mt-4">
                        <p>Imagen Actual: </p>
                        <img src="/storage/{{$Post->imagen}}" style="width:300px;" alt="">
                    </div>

                    @error('imagen')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror 
                </div>
                
                <!-- Guardar Blog -->
                <div class="form-group mt-3">
                    <input type="submit" class="btn btn-primary" value="Editar Blog">
                    
                    
                </div>


            </form>
        </div>
    </div>

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js" integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ==" crossorigin="anonymous" defer></script>
@endsection

@endsection