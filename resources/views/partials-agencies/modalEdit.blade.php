<div class="modal fade" id="editarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pen pe-2"></i>Editar agència</h1>
            </div>
            <div class="modal-body">
                <form id="form-edit-agency" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom_edit" class="nom" name="nom"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="carrer">Carrer:</label>
                        <input type="text" class="form-control" id="carrer_edit" name="carrer" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="codi_postal">Codi postal:</label>
                        <input type="text" class="form-control" id="codi_postal_edit" name="codi_postal" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="muncipis_id">Municipi:</label>
                        <select class="form-select" id="municipis_id_edit" name="municipi_id">
                            @foreach ($municipis as $municipi)
                                <option name="muncipis_id" value="{{ $municipi->id }}">
                                    {{ $municipi->nom }}</option>
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
            let id = btn.getAttribute("data-bs-id");
            let nom = btn.getAttribute("data-bs-nom");
            let carrer = btn.getAttribute("data-bs-carrer");
            let codi_postal = btn.getAttribute("data-bs-codi-postal");
            let municipis_id = btn.getAttribute("data-bs-municipi-id");
            let action = btn.getAttribute("data-bs-action");

            editarModal.querySelector('.modal-body .edit').value = id;
            editarModal.querySelector('.modal-body form').action = action;
            editarModal.querySelector('#carrer_edit ').value = carrer;
            editarModal.querySelector('#nom_edit ').value = nom;
            editarModal.querySelector('#codi_postal_edit ').value = codi_postal;

            let select = editarModal.querySelector('#municipis_id_edit');
            select.value = municipis_id;


        })
    });
</script>
