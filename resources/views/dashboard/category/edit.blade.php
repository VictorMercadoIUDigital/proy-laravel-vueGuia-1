{{-- llamamos la vista de la cual heredaremos la esrucctura --}}
@extends('dashboard.master')
@section('Titulo','AgregarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
<h1>Editar Categoria</h1>

<form action="{{ url('dashboard/category/'.$category->id) }}" method="post">
    @csrf
    @method("PUT")
    {{-- form:post --}}
    {{-- Fila 1 --}}
    <main>
        <div class="row">
            {{-- .row para crear una fila --}}
            <div class="form-group">
                <label for="name">Nombre</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $category->name }}">
            </div>
        </div>
        {{-- Fila 2 --}}
        <div class="row form-group">
            <label for="description">Descripcion</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $category->description }}</textarea>
        </div>
        {{-- Fila 3 --}}
        <div class="row center">
            {{-- Las columnas en bootstrap tiene un ancho de 12
                Añadir 2 input en una fila: 12/cantidadinput --}}
                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Registrar</button>
                    <a href="{{ url('dashboard/category') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                    
                </div>
        </div>
    </main>
    
</form>
@endsection