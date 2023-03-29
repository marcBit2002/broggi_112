<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Gestió Expedients</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/navbar_admin.scss', 'resources/css/info_carta.scss'])
</head>

<body>
    @include('layouts.navbar')

    <div class='content'>
        <div style="display: flex; align-items:center;">
            <a class="p-2" href='javascript:history.back(-1)' id="back_arrow"><img
                    src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
            <h1 class="text-primary ms-3 mb-0">Expedient <span class="text-danger">#{{ $expedientCodi }}</span></h1>
        </div>
        <div class="selection">
            <form action='{{ action([App\Http\Controllers\CartaController::class, 'update'], ['infoCartum' => $carta->id ]) }}'>
                <div class='info-carta'>
                    <form action=''>
                        <div class='cartaTrucada'>
                            <div class="wrapper">
                                <div class='title'>
                                    <p>Carta <span>#</span> {{ $carta->codi_trucada }}</p>
                                </div>
                                <div class='time'>
                                    <div class='timer'>
                                        <div class='startTime'>9:30</div>
                                        <img src="{{ Vite::asset('resources/icons/time.svg') }}">
                                        <div class='endTime'>9:41</div>
                                    </div>
                                    <div class='totalTime'>{{ $carta->durada }} segons</div>
                                </div>
                            </div>
                            <div class="phoneNumber">
                                <label for="phone" class="col-form-label">Telèfon</label>
                                <input type="text" id="phone" class="form-control"
                                    placeholder="+34 {{ $carta->telefon }}" disabled>
                            </div>
                            <div class="user">
                                <label for="user" class="col-form-label">Operador</label>
                                <input type="text" id="user" class="form-control"
                                    placeholder="{{ $carta->usuaris->nom }}" disabled>
                            </div>

                            <div class="personName">
                                <label for="name" class="col-form-label">Nom i Cognoms</label>
                                <input type="text" id="name" class="form-control"
                                    placeholder="{{ $carta->nom }} {{ $carta->cognoms }}" disabled>
                            </div>

                            <div class="personAntecedents">
                                <label for="antecedents" class="col-form-label">Antecedents</label>
                                <input type="text" id="antecedents" class="form-control"
                                    placeholder="{{ $carta->interlocutors->antecedents }}" disabled>
                            </div>

                            <div class="agencies">
                                <label for="agencies" class="col-form-label">Agències</label>
                                @foreach ($carta->cartesTrucadesHasAgencies as $cartaHasAgencia)
                                    <div class='agencia'>
                                        <textarea type="text" id="agency" class="form-control"
                                            disabled>{{ $cartaHasAgencia->agencies->nom }}</textarea>
                                        <select class="form-select" aria-label="estatAgencies">
                                            <option value="1" selected>
                                                {{ $cartaHasAgencia->estatAgencies->estat }}
                                            </option>
                                        </select>
                                    </div>
                                @endforeach
                            </div>

                            <div class="location">
                                <label for="location" class="col-form-label">Localització</label>
                                <input type="text" id="location" class="form-control"
                                    placeholder="{{ $carta->decripcio_localitzacio }}" disabled>
                            </div>


                            <div class="incidentType">
                                <label for="incidentType" class="col-form-label">Tipus</label>
                                <input type="text" id="incidentType" class="form-control"
                                    placeholder="{{ $carta->incidents->tipus_incidents->nom }}" disabled>
                            </div>

                            <div class="notaComuna">
                                <label for="notaComuna" class="col-form-label">Nota Comuna:</label>
                                <textarea id="notaComuna" class="form-control" disabled>{{ $carta->nota_comuna }}</textarea>
                            </div>
                        </div>
                        <div class='btn-guardar'>
                            <button class="btn btn-danger" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
                <div class='dades'>
                    <div class='title'>
                        <h3 class="text-primary">Dades</h3>
                    </div>
                    <div class='date'>
                        <div class='date-title'>
                            DATA
                            <img src="{{ Vite::asset('resources/icons/calendar.svg') }}">
                        </div>
                        <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}">
                        <div class='date-content'>{{ substr($carta->data_hora_trucada, 0, 10) }}</div>
                    </div>
                    <div class='type'>
                        <div class='type-title'>
                            TIPUS
                            <img src="{{ Vite::asset('resources/icons/type.svg') }}">
                        </div>
                        <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}">
                        <div class='type-content'>{{ $carta->incidents->tipus_incidents->nom }}</div>
                    </div>
                </div>
                <div class='state' style="border: 4px solid {{ $expedientEstatColor }};">
                    <div class='state-title' style="background-color: {{ $expedientEstatColor }}">
                        ESTAT
                        <img src="{{ Vite::asset('resources/icons/state.svg') }}">
                    </div>
                    <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}" style="height:inherit;">
                    <div class='state-content'>{{ $expedientEstat }}</div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
