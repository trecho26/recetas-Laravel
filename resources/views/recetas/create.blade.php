@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.css" integrity="sha512-EQF8N0EBjfC+2N2mlaH4tNWoUXqun/APQIuFmT1B+ThTttH9V1bA0Ors2/UyeQ55/7MK5ZaVviDabKbjcsnzYg==" crossorigin="anonymous" />
@endsection

@section('botones')
    <a href="{{route('recetas.index')}}" class="btn btn-primary mr-2 text-white">Volver</a>
@endsection

@section('content')
    <h1 class="text-center mb-5">Crear nueva receta</h1>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
        <form method="POST" action="{{route('recetas.store')}}" enctype="multipart/form-data" novalidate>
            @csrf
                <div class="form-group">
                    <label for="titulo">Titulo receta</label>
                    <input class="form-control @error('titulo') is-invalid @enderror " type="text" name="titulo" id="titulo" placeholder="ej. Postres" value={{old('titulo')}}>
                    @error('titulo')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <select name="categoria" id="categoria" class="form-control @error('categoria') is-invalid @enderror">
                        <option value="">-- Seleccione una categoria --</option>
                        @foreach ($categorias as $categoria)
                            <option 
                                value="{{$categoria->id}}"
                                {{old('categoria') == $categoria->id ? 'selected' : ''}}
                            >{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="preparacion">Preparacion</label>
                    <input type="hidden" name="preparacion" id="preparacion" value="{{old('preparacion')}}">
                    <trix-editor input='preparacion' class="form-control @error('preparacion') is-invalid @enderror "></trix-editor>
                    @error('preparacion')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="hidden" name="ingredientes" id="ingredientes" value="{{old('ingredientes')}}">
                    <trix-editor input='ingredientes' class="form-control @error('ingredientes') is-invalid @enderror "></trix-editor>
                    @error('ingredientes')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="imagen">Imagen de la receta</label>
                    <input type="file" name="imagen" id="imagen" class="form-control @error('imagen') is-invalid @enderror">
                    @error('imagen')
                        <span class="invalid-feedback d-block" role='alert'>
                            <strong>{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" value="Agregar receta" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.0/trix.js" integrity="sha512-S9EzTi2CZYAFbOUZVkVVqzeVpq+wG+JBFzG0YlfWAR7O8d+3nC+TTJr1KD3h4uh9aLbfKIJzIyTWZp5N/61k1g==" crossorigin="anonymous" defer></script>
@endsection

