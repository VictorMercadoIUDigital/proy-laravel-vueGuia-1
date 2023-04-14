@extends('dashboard.master')
@section('titulo','Poster')
@include('layouts/navigation')
@section('contenido')

    <main>
        <div class="container py-4">
            <div class="center"><h1>Post Publicados</h1> </div>
            @can('crear-post')
            <a href="{{ url('dashboard/post/create') }}" class="btn btn-primary btn-sm">Nuevo Post</a>
                
            @endcan
            
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Categoria</th>
                        <th>Descripcion</th>
                        <th>Estado</th>
                        <th>Fecha de creacion</th>
                        <th>Fecha de modificacion</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $post )
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->category->name}}</td>
                        <td>{{ $post->description}}</td>
                        <td>{{ $post->state}}</td>
                        <td>{{ $post->created_at}}</td>
                        <td>{{ $post->updated_at}}</td>
                        @can('editar-post')
                        <td><a href="{{ url('dashboard/post/'.$post->id.'/edit') }}" class="bi bi-pencil"></a></td>    
                        @endcan
                        
                        <td>
                            @can('eliminar-post')
                            <form action="{{ url('dashboard/post/'.$post->id) }}" method="post">
                                @method("DELETE")
                                @csrf
                                <button class="bi bi-eraser-fill" type="submit" ></button>                                
                            </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

        </div>
    </main>
    
@endsection