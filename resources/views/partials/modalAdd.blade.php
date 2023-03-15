<!-- Modal Add User -->
<div class="modal fade" id="afegirModal" tabindex="-1" aria-labelledby="lblAfegirModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Afegir usuari</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-add-user" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}"
                    method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username"
                            value="{{ old('username') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ old('nom') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="cognoms">Cognoms:</label>
                        <input type="text" class="form-control" id="cognoms" name="cognoms"
                            value="{{ old('cognoms') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="contrasenya">Contraseña:</label>
                        <input type="password" class="form-control" id="contrasenya" name="contrasenya"
                            value="{{ old('contrasenya') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tipus_usuaris_id">Tipus:</label>
                        <select class="form-control" id="tipus_usuaris_id" name="tipus_usuaris_id">
                            @foreach ($roles as $rol)
                                <option id="tipus_usuaris_id" name="tipus_usuaris_id" value="{{ $rol->id }}">
                                    {{ $rol->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-body d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal"><i
                                class="bi bi-x"></i>Cancel·lar</button>
                        <button type="submit" class="btn btn-danger delete mx-2"><i
                                class="bi bi-trash"></i>Afegir</button>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
