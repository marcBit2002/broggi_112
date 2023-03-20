<div class="modal fade" id="editarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pen pe-2"></i>Editar usuari</h1>
            </div>
            <div class="modal-body">
                <form id="form-edit-user" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" class="nom" name="nom"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cognoms">Cognoms:</label>
                        <input type="text" class="form-control" id="cognoms" name="cognoms" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="contrasenya">Contrasenya:</label>
                        <input type="text" class="form-control" id="contrasenya" name="contrasenya" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="tipus_usuaris_id">Tipus:</label>
                        {{-- <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id">
                            @foreach ($roles as $rol)
                                @if ($rol->id == $usuari->tipus_usuaris_id)
                                    <option id="tipus_usuaris_id" name="tipus_usuaris_id" selected
                                        value="{{ $rol->id }}">
                                        {{ $rol->nom }}</option>
                                @else
                                    <option id="tipus_usuaris_id" name="tipus_usuaris_id" value="{{ $rol->id }}">
                                        {{ $rol->nom }}</option>
                                @endif
                            @endforeach
                        </select> --}}
                        <select class="form-select" id="tipus_usuaris_id" name="tipus_usuaris_id">
                            @foreach ($roles as $rol)
                                @if ($rol->id == '<span id="tipusUsuariId"></span>')
                                    <option name="tipus_usuaris_id" selected value="{{ $rol->id }}">
                                        {{ $rol->nom }}</option>
                                @else
                                    <option name="tipus_usuaris_id" value="{{ $rol->id }}">
                                        {{ $rol->nom }}</option>
                                @endif
                            @endforeach
                        </select>


                    </div>
                    <div class="modal-body d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel·lar</button>
                        <button type="submit" class="btn btn-danger edit mx-2"></i>Modificar</button>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let editarModal = document.getElementById("editarModal");

    editarModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget;
        let id = button.getAttribute("data-bs-id");
        let username = button.getAttribute("data-bs-username");
        let nom = button.getAttribute("data-bs-nom");
        let cognoms = button.getAttribute("data-bs-cognoms");
        let contrasenya = button.getAttribute("data-bs-contrasenya");
        let tipusUsuariId = button.getAttribute("data-bs-tipus-id");
        let tipusUsuariNom = button.getAttribute("data-bs-tipus-nom");
        let action = button.getAttribute("data-bs-action");

        editarModal.querySelector('.modal-body .edit').value = id;
        editarModal.querySelector('.modal-body form').action = action;
        editarModal.querySelector('.modal-body #username ').value = username;
        editarModal.querySelector('.modal-body #nom ').value = nom;
        editarModal.querySelector('.modal-body #cognoms ').value = cognoms;
        editarModal.querySelector('.modal-body #contrasenya ').value = contrasenya;


        // Actualizar el valor y etiqueta del select
        let select = editarModal.querySelector('.modal-body #tipus_usuaris_id');
        select.value = tipusUsuariId;
        let selectedOption = select.options[select.selectedIndex];
        selectedOption.innerHTML = tipusUsuariNom;

        // Actualizar el valor de la variable en la condición del if
        let selectIdSpan = editarModal.querySelector('#tipusUsuariId');
        selectIdSpan.innerHTML = tipusUsuariId;


    });
</script>
