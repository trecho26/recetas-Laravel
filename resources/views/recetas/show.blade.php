@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
    <article class="contenido-receta">
        <h1 class="text-center mb-4">{{$receta->titulo}}</h1>
        <div class="imagen-receta">
        <img src="/storage/{{$receta->imagen}}" alt="foto de {{$receta->titulo}}" class="w-100">
        </div>
        <div class="receta-meta mt-3">
            <p>
                <span class="font-weight-bold text-primary">
                    Escrito en: 
                </span>
                {{$receta->categoria->nombre}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">
                    Autor: 
                </span>
                {{-- TODO: Mostrar el usuario --}}
                {{$receta->autor->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">
                    Creada: 
                </span>
                <fecha-receta fecha='{{$receta->created_at}}' ></fecha-receta>
            </p>
            
            <div class="ingredientes">
                <h2 class="my-3 text-primary">Ingredientes</h2>
                {!!$receta->ingredientes!!}
            </div>
            <div class="preparacion">
                <h2 class="my-3 text-primary">Preparacion</h2>
                {!!$receta->preparacion!!}
            </div>
            <div class="justify-content-center row text-center">
                <like-button 
                receta-id="{{$receta->id}}" 
                like="{{$like}}"
                like-count="{{$likeCount}}"
                >
                </like-button>
            </div>
        </div>
    </article>
@endsection