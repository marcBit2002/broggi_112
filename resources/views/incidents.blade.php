@extends('layouts.admin_template')

@section('titulo')
    INCIDENTS
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
            <table class="table table-striped bdr mt-4 align-middle">
                <thead class="text-white">
                    <th>Codi</th>
                    <th>Nom</th>
                    <th>Definició</th>
                    <th>Instruccions</th>
                    <th>Tipus</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($incidents as $incident)
                        <tr>
                            <td>{{ $incident->codi }}</td>
                            <td>{{ $incident->nom }}</td>
                            <td>{{ $incident->definicio }}</td>
                            <td>{{ $incident->instruccions }}</td>
                            <td>{{ $incident->tipus_incidents->nom }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    {{-- BOTON EDITAR --}}
                                    <button type="button" class="btn btn-outline-danger btn-sm me-2 btn-edit"
                                        data-bs-toggle="modal" data-bs-target="#editarModal"
                                        data-bs-id="{{ $incident->id }}" data-bs-codi="{{ $incident->codi }}"
                                        data-bs-nom="{{ $incident->nom }}" data-bs-definicio="{{ $incident->definicio }}"
                                        data-bs-instruccio="{{ $incident->instruccions }}"
                                        data-bs-tipus-id="{{ $incident->tipus_incidents_id }}"
                                        data-bs-tipus-nom="{{ $incident->tipus_incidents->nom }}"
                                        data-bs-action="{{ action([App\Http\Controllers\IncidentController::class, 'update'], ['incident' => $incident->id]) }}">
                                        <i class="bi bi-pen"></i>
                                    </button>

                                    {{-- BOTON ELIMINAR --}}
                                    <button type="button" class="btn btn-outline-danger  btn-sm btn-delete"
                                        data-bs-toggle="modal" data-bs-target="#eliminaModal"
                                        data-bs-id="{{ $incident->id }}" data-bs-codi="{{ $incident->codi }}"
                                        data-bs-nom="{{ $incident->nom }}"
                                        data-bs-action="{{ action([App\Http\Controllers\IncidentController::class, 'destroy'], ['incident' => $incident->id]) }}">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('partials-incidents.modalDelete')
        @include('partials-incidents.modalAdd')
        @include('partials-incidents.modalEdit')



        <div class='add-button'>
            {{ $incidents->links() }}
            <div>
                <button type="button" class="btn btn-danger text-white" data-bs-toggle="modal"
                    data-bs-target="#afegirModal">
                    <i class="bi bi-plus-lg me-2"></i>Afegir incident
                </button>
            </div>
        </div>

    </div>
@endsection
