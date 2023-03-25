<div class="modal fade" id="afegirModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="lblModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-fire pe-2"></i>Afegir
                    incident</h1>
            </div>
            <div class="modal-body">
                @include('layouts.mensajes')
                <form id="form-add-incident"
                    action="{{ action([App\Http\Controllers\IncidentController::class, 'store']) }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="codi">Codi:</label>
                        <input type="text" class="form-control" id="codi" name="codi"
                            value="{{ old('codi') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                            value="{{ old('nom') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="definicio">Definició:</label>
                        <input type="text" class="form-control" id="definicio" name="definicio"
                            value="{{ old('definicio') }}" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="instruccions">Instruccions:</label>
                        <input type="text" class="form-control" id="instruccions" name="instruccions"
                            value="{{ old('instruccions') }}" required>
                    </div>
                    <div class="form-group  mb-3">
                        <label for="tipus_incidents_id">Tipus incident:</label>
                        <select class="form-select" id="tipus_incidents_id" name="tipus_incidents_id">
                            @foreach ($tipusIncidents as $tipusIncident)
                                <option id="tipus_incidents_id" name="tipus_incidents_id"
                                    value="{{ $tipusIncident->id }}">
                                    {{ $tipusIncident->nom }}</option>
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
