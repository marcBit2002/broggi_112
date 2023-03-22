<div class="modal fade" id="editarModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-pen pe-2"></i>Editar agència</h1>
            </div>
            <div class="modal-body">
                <form id="form-edit-incident" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="codi">Codi:</label>
                        <input type="text" class="form-control" id="codi_edit" name="codi" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom_edit" name="nom" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="definicio">Definició:</label>
                        <input type="text" class="form-control" id="definicio_edit" name="definicio" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="instruccions">Instruccions:</label>
                        <input type="text" class="form-control" id="instruccions_edit" name="instruccions" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="tipus_incidents_id">Tipus incident:</label>
                        <select class="form-select" id="tipus_incidents_id_edit" name="tipus_incidents_id">
                            @foreach ($tipusIncidents as $tipusIncident)
                                <option id="tipus_incidents_id" name="tipus_incidents_id"
                                    value="{{ $tipusIncident->id }}">
                                    {{ $tipusIncident->nom }}</option>
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
            let codi = btn.getAttribute("data-bs-codi");
            let definicio = btn.getAttribute("data-bs-definicio");
            let instruccions = btn.getAttribute("data-bs-instruccio");
            let tipus_incidents = btn.getAttribute("data-bs-tipus-id");
            let action = btn.getAttribute("data-bs-action");

            editarModal.querySelector('.modal-body .edit').value = id;
            editarModal.querySelector('.modal-body form').action = action;
            editarModal.querySelector('#codi_edit ').value = codi;
            editarModal.querySelector('#nom_edit ').value = nom;
            editarModal.querySelector('#definicio_edit ').value = definicio;
            editarModal.querySelector('#instruccions_edit ').value = instruccions;

            let select = editarModal.querySelector('#tipus_incidents_id_edit');
            select.value = tipus_incidents;


        })
    });
</script>
