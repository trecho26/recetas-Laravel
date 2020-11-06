@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
    <h1 class="text-center">Editar mi perfil</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10 bg-white p-3">
            <form action=" {{route('perfil.update', ['perfil' => $perfil->id])}} " method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input class="form-control @error('nombre') is-invalid @enderror " type="text" name="nombre" id="nombre" placeholder="Tu nombre" value="{{$perfil->usuario->name}}" >
                    @error('nombre')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="url">Tu sitio web</label>
                    <input class="form-control @error('url') is-invalid @enderror " type="text" name="url" id="url" placeholder="Tu sitio web" value="{{$perfil->usuario->url}}" >
                    @error('url')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="biografia">Biografia</label>
                    <input type="hidden" name="biografia" id="biografia" value="{{$perfil->biografia}}">
                    <trix-editor input='biografia' class="form-control @error('biografia') is-invalid @enderror "></trix-editor>
                    @error('biografia')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen de perfil</label>
                    <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                    @if ($perfil->imagen)
                        <div class="mt-4 imagen-actual">
                            <p>Imagen actual</p>
                            <img src="/storage/{{$perfil->imagen}}" alt="Imagen de {{$perfil->imagen}}">
                        </div>
                    @endif
                    
                    @error('imagen')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Editar perfil" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
@endsection