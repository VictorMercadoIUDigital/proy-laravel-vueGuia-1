<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('crear-rol')
                        <a href="{{ url('roles/create') }}" class="btn btn-primary btn-sm">Nuevo rol</a>
                    @endcan
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Rol</th>
                            <th>Permisos</th>
                            <th>Editar</th>
                            <th>Eliminar</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($roles as $rol )
                            <tr>

                                <td>{{ $rol->name }}</td>
                                <td>
                                    @forelse ($rol->permissions as $permission)
                                        <span class="badge text-bg-info">{{ $permission->name }}</span>


                                    @empty
                                        <span class="badge text-bg-danger">
                                            No tiene permisos.

                                        </span>
                                    @endforelse
                                </td>
                                <td>
                                    @can('editar-rol')
                                        <a href="{{ url('roles/' . $rol->id . '/edit') }}" class="bi bi-pencil"></a>
                                    </td>
                                @endcan
                                <td>
                                    @can('eliminar-rol')
                                        <form action="{{ url('roles/' . $rol->id) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="bi bi-eraser-fill" type="submit"></button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <p>No hay roles</p>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>
    </div>
</x-app-layout>
