@extends('layouts.admin_template', ['activeNav' => $activeNav])

@section('titulo')
    AGÈNCIES
@endsection

@section('contenido')
    <div class='crud-content'>
        {{-- <div class='search'>
            <div class="input-group">
                <span class="input-group-text border border-primary border-3 border-end-0 text-warning">
                    <i class="bi bi-search"></i>
                </span>
                <input type="search" class="form-control border border-3 border-start-0 border-primary"
                    placeholder="Buscar" />
            </div>
        </div> --}}
        @include('layouts.mensajes')
        <div class='table-content'>
            <table class="table table-striped bdr mt-4 align-middle">
                <thead class="text-white">
                    <th>Nom</th>
                    <th>Carrer</th>
                    <th>Codi Postal</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($agencies as $agencia)
                        <tr>
                            <td>{{ $agencia->nom }}</td>
                            <td>{{ $agencia->carrer }}</td>
                            <td>{{ $agencia->codi_postal }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    {{-- BOTON EDITAR --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm me-2 btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#editarModal" data-bs-id="{{ $agencia->id }}"
                                        data-bs-nom="{{ $agencia->nom }}" data-bs-carrer="{{ $agencia->carrer }}"
                                        data-bs-codi-postal="{{ $agencia->codi_postal }}"
                                        data-bs-municipi-id="{{ $agencia->municipis->id }}"
                                        data-bs-action="{{ action([App\Http\Controllers\AgenciaController::class, 'update'], ['agency' => $agencia->id]) }}">
                                        <i class="bi bi-pen"></i>
                                    </button>

                                    {{-- BOTON ELIMINAR --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm btn-delete"
                                        data-bs-toggle="modal" data-bs-target="#eliminaModal"
                                        data-bs-id="{{ $agencia->id }}" data-bs-nom="{{ $agencia->nom }}"
                                        data-bs-carrer="{{ $agencia->carrer }}"
                                        data-bs-action="{{ action([App\Http\Controllers\AgenciaController::class, 'destroy'], ['agency' => $agencia->id]) }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials-agencies.modalDelete')
        @include('partials-agencies.modalAdd')
        @include('partials-agencies.modalEdit')



        <div class='add-button'>
            {{ $agencies->links() }}
            <div>
                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                    data-bs-target="#afegirModal">
                    <i class="bi bi-plus-lg me-2"></i>Afegir agència
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
