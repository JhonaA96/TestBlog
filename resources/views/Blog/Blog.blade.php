<!-- Importamos de la app layout -->
@extends('layouts.app')


<!-- Agregamos Botones -->
@section('botones')

<a href=" {{ route('Blog.Create') }} " class="btn btn-primary mr-2 text-white">Crear Publicación </a>
<a href=" {{ route('Autor.Create') }} " class="btn btn-primary mr-2 text-white">Crear Autor </a>

@endsection

<!-- Agregamos Contenido de la Db -->
@section('content')

<h2 class="text-center mb-5">Cuentanos sobre lo que te gusta</h2>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Titulo</th>
                <th scole="col">Autor</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Post as $Post)
            <tr>
                <td>{{$Post->titulo}}</td>
                <td>{{$Post->autor->nombre_completo}}</td>
                <td>
                    <eliminar-post post-id={{$Post->id}}></eliminar-post>
                    <a href="{{ route('Blog.Edit', ['post' => $Post->id])}}" class="btn btn-dark mb-2 d-block">Editar</a>
                    <a href="{{ route('Blog.Show', ['post' => $Post->id])}}" class="btn btn-success mb-2 d-block">Ver</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection