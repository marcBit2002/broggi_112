@extends('layouts.admin_template')

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
        <div class='table-content'>
            @if (count($usuaris) > 0)
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
                                        {{-- BOTON EDITAR --}}
                                        <button type="button" class="btn btn-danger btn-sm me-2" data-bs-toggle="modal"
                                            data-bs-target="#editarModal">
                                            <i class="bi bi-pen "></i>
                                        </button>

                                        {{-- BOTON ELIMINAR --}}
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#eliminaModal" data-bs-id="{{ $usuari->id }}"
                                            data-bs-username="{{ $usuari->username }}"
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
            @else
                <div class="alert alert-dark text-center">No hi ha cap usuari</div>
            @endif

        </div>

        @include('partials.modal')
        @include('partials.modalAdd')
        @include('partials.modalEdit')



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
@endsection
