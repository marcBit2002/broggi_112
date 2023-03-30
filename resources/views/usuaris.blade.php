@extends('layouts.admin_template', ['activeNav' => $activeNav])

@section('titulo')
    USUARIS
@endsection

@section('contenido')
    <div class='crud-content'>
        <div class='search'>
            <div class="input-group">
                <span class="input-group-text border border-primary border-3 border-end-0 text-warning">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search" class="form-control border border-3 border-start-0 border-primary"
                    placeholder="Buscar" />
            </div>
        </div>
        @include('layouts.mensajes')
        <div class='table-content'>
            <table class="table table-striped bdr mt-4 align-middle">
                <thead class="text-white">
                    <th>Username</th>
                    <th>Nom</th>
                    <th>Cognoms</th>
                    <th>Tipus</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($usuaris as $usuari)
                        <tr>
                            <td>{{ $usuari->username }}</td>
                            <td>{{ $usuari->nom }}</td>
                            <td>{{ $usuari->cognoms }}</td>
                            <td>{{ $usuari->roles->nom }}</td>
                            <td>
                                <div class="d-flex justify-content-end">

                                    <button type="button" class="btn btn-outline-danger btn-sm me-2 btn-passwd"
                                        data-bs-toggle="modal" data-bs-target="#contraModal"
                                        data-bs-id="{{ $usuari->id }}"
                                        data-bs-nomCognoms="{{ $usuari->nom }} {{ $usuari->cognoms }}"
                                        data-bs-action="{{ action([App\Http\Controllers\UsuarioController::class, 'resetPasswd'], ['usuari' => $usuari->id]) }}">
                                        <i class="bi bi-key"></i>
                                        {{-- data-bs-contrasenya="{{ $usuari->contrasenya }}" --}}
                                    </button>

                                    {{-- BOTON EDITAR --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm me-2 btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#editarModal"
                                        data-bs-id="{{ $usuari->id }}" data-bs-username="{{ $usuari->username }}"
                                        data-bs-nom="{{ $usuari->nom }}" data-bs-cognoms="{{ $usuari->cognoms }}"
                                        data-bs-contrasenya="{{ $usuari->contrasenya }}"
                                        data-bs-tipus-id="{{ $usuari->tipus_usuaris_id }}"
                                        data-bs-tipus-nom="{{ $usuari->roles->nom }}"
                                        data-bs-action="{{ action([App\Http\Controllers\UsuarioController::class, 'update'], ['usuari' => $usuari->id]) }}">
                                        <i class="bi bi-pen"></i>
                                    </button>

                                    {{-- BOTON ELIMINAR --}}
                                    <button type="button" class="btn btn-outline-danger  btn-sm btn-delete"
                                        data-bs-toggle="modal" data-bs-target="#eliminaModal"
                                        data-bs-id="{{ $usuari->id }}" data-bs-username="{{ $usuari->username }}"
                                        data-bs-nomCognoms="{{ $usuari->nom }} {{ $usuari->cognoms }}"
                                        data-bs-action="{{ action([App\Http\Controllers\UsuarioController::class, 'destroy'], ['usuari' => $usuari->id]) }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials-usuaris.modal')
        @include('partials-usuaris.modalAdd')
        @include('partials-usuaris.modalEdit')
        @include('partials-usuaris.modalPasswd')



        <div class='add-button'>
            {{ $usuaris->links() }}
            <div>
                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                    data-bs-target="#afegirModal">
                    <i class="bi bi-plus-lg me-2"></i>Afegir usuari
                </button>
            </div>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @if (Session::has('mostrarModalAdd'))
        <script>
            $(document).ready(function() {
                $('#afegirModal').modal('show');
            });
        </script>
    @elseif(Session::has('mostrarModalEdit'))
        <script>
            $(document).ready(function() {
                $('#editarModal').modal('show');
            });
        </script>
    @endif
@endsection
