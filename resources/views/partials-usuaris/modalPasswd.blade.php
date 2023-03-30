<!-- Modal Passwd User -->
<div class="modal fade" id="contraModal" tabindex="-1" aria-labelledby="lblcontraModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modficar contrasenya</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="mb-4"></p>
                <form method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="contrasenya_reset" name="contrasenya" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel·lar</button>
                        <button type="submit" class="btn btn-danger reset mx-2"></i>Actualitzar</button>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let passwd_button = document.querySelectorAll(".btn-passwd")

    passwd_button.forEach(btn => {
        btn.addEventListener('click', event => {
            let id = btn.getAttribute("data-bs-id");
            let username = btn.getAttribute("data-bs-username");
            let nom = btn.getAttribute("data-bs-nomCognoms")
            let action = btn.getAttribute("data-bs-action");
            contraModal.querySelector('.modal-body .reset').value = id;
            contraModal.querySelector('.modal-body form').action = action;
            contraModal.querySelector('.modal-body p ').innerHTML =
                "Canviar la contrasenya a l'usuari <span id='estil'>" +
                nom +
                "</span>" + "?";

            //Estils pel modal
            let nombre = contraModal.querySelector('#estil');
            nombre.style.fontStyle = "italic";
            nombre.style.fontWeight = "bold";

            let text = contraModal.querySelector('p');
            text.style.color = "#767676";

            let titol = contraModal.querySelector('h1');
            titol.style.color = "#087ca7";
        })
    });
</script>
