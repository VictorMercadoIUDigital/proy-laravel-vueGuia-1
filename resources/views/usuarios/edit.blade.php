<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creacion de usuarios') }}
        </h2>
        hola!
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @include('dashboard.partials.validation-error')
                    <form action="{{ url('usuarios/'.$user->id) }}" method="post">
                        @method("PUT")
                        @csrf
                        {{-- form:post --}}
                        {{-- Fila 1 --}}

                        {{-- .row para crear una fila --}}
                        <div class="mb-3 row">
                            <label for="name">Nombre:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name">E-mail:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="email" id="email"
                                    value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name">Password:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="password" id="password"
                                    value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="name">Confirmar Password:</label>
                            <div class="col-sm-5">
                                <input class="form-control" type="text" name="confirm-password" id="confirm-password"
                                    value="">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="description">Rol:</label>
                            <div class="col-sm-5">
                                <select name="roles" id="roles" class="form-select" required>
                                    <option value="">Seleccionar el rol</option>
                                    @foreach ($roles as $id=>$rol)
                                        <option value="{{ $id }}">{{ $rol }}</option>
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
                                <a href="{{ url('usuarios') }}" class="btn btn-secondary btn-sm">Cancelar</a>

                            </div>
                        </div>

                        {{-- Fila 2 --}}



                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
