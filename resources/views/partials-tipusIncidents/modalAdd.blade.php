<div class="modal fade" id="afegirModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-grid pe-2"></i>Afegir
                    tipus incident</h1>
            </div>
            <div class="modal-body">
                <form id="form-add-tipusIncident"
                    action="{{ action([App\Http\Controllers\TipusIncidentController::class, 'store']) }}"
                    method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ old('nom') }}" required>
                    </div>
                    <div class="modal-body d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Cancel·lar</button>
                        <button type="submit" class="btn btn-danger delete mx-2"></i>Afegir</button>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
