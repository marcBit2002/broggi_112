<div class="modal fade" id="editarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pen pe-2"></i>Editar tipus
                    incident
                </h1>
            </div>
            <div class="modal-body">
                <form id="form-edit-tipusIncident" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom_edit" class="nom" name="nom"
                            required>
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
            let action = btn.getAttribute("data-bs-action");

            editarModal.querySelector('.modal-body .edit').value = id;
            editarModal.querySelector('.modal-body form').action = action;
            editarModal.querySelector('#nom_edit ').value = nom;

        })
    });
</script>
