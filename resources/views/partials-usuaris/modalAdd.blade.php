@extends('layouts.modal_template')

@section('idModal')
    afegirModal
@endsection

@section('iconClass')
    bi bi-person-fill-add
@endsection

@section('titolModal')
    Afegir usuari
@endsection

@section('form-modal')
    <form id="form-add-user" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
        @csrf
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
            <button type="submit" class="btn btn-danger delete mx-2"></i>Afegir</button>
            </button>
        </div>
    </form>
@endsection

{{-- @if (Session::has('show'))
    <script>
        const myModal = document.getElementById("afegirModal");
        myModal.show();
    </script>
@endif --}}
