@extends('layouts.app')

@section('botones')
    <a href="{{route('recetas.create')}}" class="btn btn-primary mr-2 text-white">Crear receta</a>
@endsection

@section('content')
    <h1 class="text-center mb-5">Administra tus recetas</h1>
    <div class="mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
                <tr>
                    <th scole='col'>Titulo</th>
                    <th scole='col'>Categoria</th>
                    <th scole='col'>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($recetas as $receta)
                    <tr>
                        <td>{{$receta->titulo}}</td>
                        <td>{{$receta->categoria->nombre}}</td>
                        <td>
                            <eliminar-receta
                                receta-id={{$receta->id}}
                            ></eliminar-receta>
                            <a href="{{route('recetas.edit', ['receta'=>$receta->id])}}" class="btn btn-dark">Editar</a>
                            <a href="{{route('recetas.show', ['receta'=>$receta->id])}}" class="btn btn-success">Ver</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$recetas->links()}}
    </div>
    <h2 class="text-center mt-5">Recetas que te gustan</h2>
    @if (count($usuario->meGusta))
        <div class="mx-auto bg-white p-3">
            <ul class="list-group">
                @foreach ($usuario->meGusta as $receta)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>{{$receta->titulo}}</span>
                    <a href="{{route('recetas.show', ['receta'=>$receta->id])}}" class="btn btn-success">Ver</a>
                </li>
                @endforeach
            </ul>
        </div>
    @else
        <p class="text-center">No le has dado like a ninguna receta</p>
    @endif
@endsection

