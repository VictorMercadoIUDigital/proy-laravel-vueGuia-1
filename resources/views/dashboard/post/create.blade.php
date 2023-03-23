{{-- llamamos la vista de la cual heredaremos la esrucctura --}}
@extends('dashboard.master')
@section('Titulo','AgregarPost')
@section('contenido')
@include('dashboard.partials.validation-error')

<main>
    <div class="container py-4">
        <h1>Registrar publicacion</h1>

    
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        {{-- form:post --}}
        {{-- Fila 1 --}}
        
            {{-- .row para crear una fila --}}
                <div class="mb-3 row">
                    <label for="name">Nombre Publicacion:</label>
                    <div class="col-sm-5">
                        <input class="form-control" type="text" name="name" id="name" value ="{{ old('name') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="description">Contenido:</label>
                    <div class="col-sm-5">
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>
                </div>
                    <div class="mb-3 row">
                        <label for="description">Categoria:</label>
                        <div class="col-sm-5">
                            <select name="category" id="category" class="form-select" required>
                                <option value="">Seleccionar Categoria</option>
                                @foreach ($category as $category)
                                <option value="{{ $category->id}}">{{ $category->name}}</option>
                                    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    {{-- Fila 3 --}}
                    <div class="row center">
                        {{-- Las columnas en bootstrap tiene un ancho de 12
                            Añadir 2 input en una fila: 12/cantidadinput --}}
                            <div class="col s6">
                                <button class="btn btn-success btn-sm" type="submit">Publicar</button>
                                <a href="{{ url('dashboard/post') }}" class="btn btn-secondary btn-sm">Cancelar</a>
                                
                            </div>
                    </div>
            
            {{-- Fila 2 --}}
            
    
    
    </form>
    </div>
</main>
@endsection