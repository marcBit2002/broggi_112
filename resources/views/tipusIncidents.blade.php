@extends('layouts.admin_template', ['activeNav' => $activeNav])

@section('titulo')
    TIPUS INCIDENTS
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
        <div class='table-content'>
            <table class="table table-striped bdr mt-4 align-middle">
                <thead class="text-white">
                    <th>Nom</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($tipusIncidents as $tipusIncident)
                        <tr>
                            <td>{{ $tipusIncident->nom }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    {{-- BOTON EDITAR --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm me-2 btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#editarModal"
                                        data-bs-id="{{ $tipusIncident->id }}" data-bs-nom="{{ $tipusIncident->nom }}"
                                        data-bs-action="{{ action([App\Http\Controllers\TipusIncidentController::class, 'update'], ['tipusIncident' => $tipusIncident->id]) }}">
                                        <i class="bi bi-pen"></i>
                                    </button>

                                    {{-- BOTON ELIMINAR --}}
                                    <button type="button" class="btn btn-outline-danger  btn-sm btn-delete"
                                        data-bs-toggle="modal" data-bs-target="#eliminaModal"
                                        data-bs-id="{{ $tipusIncident->id }}" data-bs-nom="{{ $tipusIncident->nom }}"
                                        data-bs-action="{{ action([App\Http\Controllers\TipusIncidentController::class, 'destroy'], ['tipusIncident' => $tipusIncident->id]) }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials-tipusIncidents.modalDelete')
        @include('partials-tipusIncidents.modalAdd')
        @include('partials-tipusIncidents.modalEdit')



        <div class='add-button'>
            {{ $tipusIncidents->links() }}
            <div>
                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                    data-bs-target="#afegirModal">
                    <i class="bi bi-plus-lg me-2"></i>Afegir tipus incident
                </button>
            </div>
        </div>

    </div>
@endsection
