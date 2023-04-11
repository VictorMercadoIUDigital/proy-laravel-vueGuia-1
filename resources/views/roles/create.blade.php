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
                    @include('dashboard.partials.validation-error')
                    <form action="{{ route('roles.store') }}" method="post">
                        @csrf
                        {{-- form:post --}}
                        {{-- Fila 1 --}}

                        {{-- .row para crear una fila --}}
                        <div class="mb-3 row">
                            <label for="name">Nombre del rol:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ old('name') }}">
                            </div>
                        </div>
                        {{-- Fila 2 --}}
                        <div class="mb-3 row">
                            <label for="name">Permisos del rol</label>
                            <div class="col-sm-5">
                              <table>
                                <tbody>
                                    @foreach ($permission as $id=>$permiso )
                                    <tr>
                                        <td>
                                            <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $id }}">
                               {{ $permiso }} 

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                            </div>
                            
                            
                        </div>

                        {{-- Fila 3 --}}
                        <div class="row center">
                            {{-- Las columnas en bootstrap tiene un ancho de 12
                                            Añadir 2 input en una fila: 12/cantidadinput --}}
                            <div class="col s6">
                                <button class="btn btn-success btn-sm" type="submit">Guardar</button>
                                <a href="{{ url('roles') }}" class="btn btn-secondary btn-sm">Cancelar</a>

                            </div>
                        </div>

                        {{-- Fila 2 --}}



                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
