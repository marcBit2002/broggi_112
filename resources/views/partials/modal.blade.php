<!-- Modal Delete User -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="lblEliminarModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Esborrar Usuari</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0"></p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                            class="bi bi-x"></i>Cancel·lar</button>
                    <button type="submit" class="btn btn-danger delete"><i class="bi bi-trash"></i>Eliminar</button>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let eliminaModal = document.getElementById("eliminaModal");

    eliminaModal.addEventListener('shown.bs.modal', event => {
        let button = event.relatedTarget;
        let id = button.getAttribute("data-bs-id");
        let username = button.getAttribute("data-bs-username");
        let nom = button.getAttribute("data-bs-nomCognoms")
        let action = button.getAttribute("data-bs-action");
        eliminaModal.querySelector('.modal-footer .delete').value = id;
        eliminaModal.querySelector('.modal-footer form').action = action;
        eliminaModal.querySelector('.modal-header h1 ').innerHTML = "Anem a eliminar a <span id='estilTitol'>" +
            username +
            "</span>";
        eliminaModal.querySelector('.modal-body p ').innerHTML = "Eliminar a l'usuari <span id='estil'>" +
            nom +
            "</span>" + " comporta que no podràs recuperar-ho un cop eliminat";

        //Estils pel modal
        let nombre = eliminaModal.querySelector('#estil');
        nombre.style.fontStyle = "italic";
        nombre.style.fontWeight = "bold";

        let usuari = eliminaModal.querySelector('#estilTitol');
        usuari.style.fontStyle = "italic";
        usuari.style.fontWeight = "bold";

        let text = eliminaModal.querySelector('p');
        text.style.color = "#767676";

        let titol = eliminaModal.querySelector('h1');
        titol.style.color = "#087ca7";
    });
</script>
