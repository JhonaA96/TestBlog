@extends('layouts.app')

@section('styles')

@endsection

@section('content')

    <div class="container nuevos-post">
        <h2 class="titulo-post text-uppercase mt-5 mb-4">últimos Posts</h2>
        <div class="">
            @foreach($new as $new)
            <div class="col-md-4">
                <div class="card">

                    <img src="/storage/{{ $new->imagen}}" alt="imagen post" class="card-img-top">
                    <div class="card-body">
                        <h3>{{ Str::upper(strip_tags($new->titulo) }}</h3>

                        <p> {{ Str::words(strip_tags($new->contenido), 20) }}</p>

                        <h3>Autor:</h3>
                        <h3>{{$new->autor->nombre_completo}}</h2>

                        <h2>Fecha: </h2>
                        <fecha-post fecha = "{{$fecha}}"></fecha-post>

                        <a href="{{route('Blog.Show'), ['post' => $new->id] }}" 
                            class="btn btn-primary d-block font-weight-bold text-uppercase">
                            Ver Post
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> 
@endsection