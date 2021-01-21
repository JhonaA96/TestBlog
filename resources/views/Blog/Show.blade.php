@extends('layouts.app')

<!-- Agregamos Botones -->
@section('botones')
    <a href=" {{ route('Blog.Blog') }} " class="btn btn-primary mr-2 text-white">Regresar</a>
@endsection

@section('content')

<article class="contenido-post">
    <h1 class="text-center mb-4">{{$Post->titulo}}</h1>

    <div class="imagen-receta">
        <img src="/storage/{{$Post->imagen}}" alt="Imagen Post" class="w-100">
    </div>

    <div class="post-meta">
        <p>
            <span class="font-weight-bold text-primary">Escrito por:</span>
            {{$Post->autor->nombre_completo}}
            
        </p>
        <p>
            <span class="font-weight-bold text-primary">Fecha:</span>
            @php
                $fecha = $Post->created_at
            @endphp
            <fecha-post fecha = "{{$fecha}}"></fecha-post>
        </p>

        

        <div class="Contenido">
            {!!$Post->contenido!!}
        </div>

    </div>
</article>
@endsection