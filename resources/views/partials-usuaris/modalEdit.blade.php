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
                        <input type="text" class="form-control" id="username_edit" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom_edit" class="nom" name="nom"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cognoms">Cognoms:</label>
                        <input type="text" class="form-control" id="cognoms_edit" name="cognoms" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="contrasenya">Contrasenya:</label>
                        <input type="text" class="form-control" id="contrasenya_edit" name="contrasenya" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="tipus_usuaris_id">Tipus:</label>
                        <select class="form-select" id="tipus_usuaris_id_edit" name="tipus_usuaris_id">
                            @foreach ($roles as $rol)
                                <option name="tipus_usuaris_id" value="{{ $rol->id }}">
                                    {{ $rol->nom }}</option>
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
    let edit_buttons = document.querySelectorAll(".btn-edit")

    edit_buttons.forEach(btn => {
        btn.addEventListener('click', event => {
            // let btn = event.relatedTarget;
            let id = btn.getAttribute("data-bs-id");
            let username = btn.getAttribute("data-bs-username");
            let nom = btn.getAttribute("data-bs-nom");
            let cognoms = btn.getAttribute("data-bs-cognoms");
            let contrasenya = btn.getAttribute("data-bs-contrasenya");
            let tipusUsuariId = btn.getAttribute("data-bs-tipus-id");
            let tipusUsuariNom = btn.getAttribute("data-bs-tipus-nom");
            let action = btn.getAttribute("data-bs-action");

            editarModal.querySelector('.modal-body .edit').value = id;
            editarModal.querySelector('.modal-body form').action = action;
            editarModal.querySelector('#username_edit ').value = username;
            editarModal.querySelector('#nom_edit ').value = nom;
            editarModal.querySelector('#cognoms_edit ').value = cognoms;
            editarModal.querySelector('#contrasenya_edit ').value = contrasenya;

            // Actualizar el valor y etiqueta del input select
            let select = editarModal.querySelector('#tipus_usuaris_id_edit');
            select.value = tipusUsuariId;
        })
    });
</script>
{{-- 
@if (Session::has('show'))
    <script>
        // const myModal = document.getElementById("editarModal");
        // myModal.show();
        
    </script>
@endif --}}
