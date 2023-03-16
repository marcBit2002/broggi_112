@extends('layouts.modal_template')

@section('idModal')
    editarModal
@endsection

@section('iconClass')
    bi bi-trash
@endsection

@section('titolModal')
    Editar usuari
@endsection

@section('form-modal')
    {{-- <form id=""
        action="{{ action([App\Http\Controllers\UsuarioController::class, 'update'], ['usuari' => $usuari->id]) }}"
        method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ old('nom') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="cognoms">Cognoms:</label>
            <input type="text" class="form-control" id="cognoms" name="cognoms" value="{{ old('cognoms') }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="contrasenya">Contrasenya:</label>
            <input type="password" class="form-control" id="contrasenya" name="contrasenya" value="{{ old('contrasenya') }}"
                required>
        </div>
        <div class="form-group  mb-3">
            <label for="tipus_usuaris_id">Tipus:</label>
            <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id">
                @foreach ($roles as $rol)
                    <option id="tipus_usuaris_id" name="tipus_usuaris_id" value="{{ $rol->id }}">
                        {{ $rol->nom }}</option>
                @endforeach
            </select>

        </div>
        <div class="modal-body d-flex justify-content-end">
            <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel·lar</button>
            <button type="submit" class="btn btn-danger delete mx-2"></i>Modificar</button>
            </button>
        </div>
    </form> --}}
@endsection
