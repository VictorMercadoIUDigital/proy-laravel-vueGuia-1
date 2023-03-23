{{-- llamamos la vista de la cual heredaremos la esrucctura --}}
@extends('dashboard.master')
@section('Titulo','EditarPost')
@section('contenido')
@include('dashboard.partials.validation-error')
<h1>Editar post</h1>

<form action="{{ url('dashboard/post/'.$post->id) }}" method="post">
    @method("PUT")
    @csrf
    {{-- form:post --}}
    {{-- Fila 1 --}}
    <main>
        <div class="row">
            {{-- .row para crear una fila --}}
            <div class="form-group">
                <label for="name">Articulo</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $post->name }}">
            </div>
        </div>
        {{-- Fila 2 --}}
        <div class="row form-group">
            <label for="description">Contenido</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $post->description }}</textarea>
        </div>
        <div class="mb-3 row">
            <label for="description">Categoria:</label>
            <div class="col-sm-5">
                <select name="category" id="category" class="form-select" required>
                    <option value="">Seleccionar Categoria</option>
                    @foreach ($category as $category)
                    <option value="{{ $category->id}}" @if($category->id==$post->category_id) {{ 'selected' }} @endif>{{ $category->name}}</option>
                        
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Fila 3 --}}
        <div class="row center">
            {{-- Las columnas en bootstrap tiene un ancho de 12
                Añadir 2 input en una fila: 12/cantidadinput --}}
                <div class="col s6">
                    <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                    <a href="{{ url('dashboard/post') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                    
                </div>
        </div>
    </main>
    
</form>
@endsection