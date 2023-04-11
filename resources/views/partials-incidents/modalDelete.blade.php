<!-- Modal Delete User -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="lblEliminarModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Esborrar Incident</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-0"></p>
            </div>
            <div class="modal-footer">
                <form method="post">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"></i>Cancel·lar</button>
                    <button type="submit" class="btn btn-danger delete">Eliminar<i
                            class="bi bi-trash3 ps-2"></i></button>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let delete_button = document.querySelectorAll(".btn-delete")

    delete_button.forEach(btn => {
        btn.addEventListener('click', event => {
            let id = btn.getAttribute("data-bs-id");
            let nom = btn.getAttribute("data-bs-nom");
            let codi = btn.getAttribute("data-bs-codi");
            let action = btn.getAttribute("data-bs-action");
            eliminaModal.querySelector('.modal-footer .delete').value = id;
            eliminaModal.querySelector('.modal-footer form').action = action;
            eliminaModal.querySelector('.modal-header h1 ').innerHTML =
                "Anem a eliminar a <span id='estilTitol'>" +
                codi +
                "</span>";
            eliminaModal.querySelector('.modal-body p ').innerHTML =
                "Eliminar l'incident <span id='estil'>" +
                nom +
                "</span>" + " comporta que no podràs recuperar-ho un cop eliminat";

            //Estils pel modal
            let nombre = eliminaModal.querySelector('#estil');
            nombre.style.fontStyle = "italic";
            nombre.style.fontWeight = "bold";

            let codigo = eliminaModal.querySelector('#estilTitol');
            codigo.style.fontStyle = "italic";
            codigo.style.fontWeight = "bold";

            let text = eliminaModal.querySelector('p');
            text.style.color = "#767676";

            let titol = eliminaModal.querySelector('h1');
            titol.style.color = "#087ca7";
        })
    });
</script>
