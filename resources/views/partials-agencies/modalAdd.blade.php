<div class="modal fade" id="afegirModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-building-add pe-2"></i>Afegir
                    agència</h1>
            </div>
            <div class="modal-body">
                <form id="form-add-agency"
                    action="{{ action([App\Http\Controllers\AgenciaController::class, 'store']) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ old('nom') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="carrer">Carrer:</label>
                        <input type="text" class="form-control" id="carrer" name="carrer"
                            value="{{ old('carrer') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="codi_postal">Codi postal:</label>
                        <input type="number" class="form-control" id="codi_postal" name="codi_postal"
                            value="{{ old('codi_postal') }}" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="municipi_id">Municipi:</label>
                        <select class="form-select" id="municipi_id" name="municipi_id">
                            @foreach ($municipis as $municipi)
                                <option id="municipi_id" name="municipi_id" value="{{ $municipi->id }}">
                                    {{ $municipi->nom }}</option>
                            @endforeach
                        </select>
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
