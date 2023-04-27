<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Gestió Expedients</title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/favicon.ico') }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/navbar_admin.scss', 'resources/css/info_carta.scss'])
</head>

<body>
    @include('layouts.navbar')

    <div class='content'>
        <div style="display: flex; align-items:center;">

            @if (Auth::check() && Auth::user()->roles->nom === 'Administrador Sistema')
                <a class="p-2" href='{{ url('admin/expedients/infoExpedient/' . $expedientId . '/edit') }}'
                    id="back_arrow"><img src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
            @else
                <a class="p-2" href='{{ url('expedients/infoExpedient/' . $expedientId . '/edit') }}'
                    id="back_arrow"><img src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
            @endif

            <h1 class="text-primary ms-3 mb-0">Expedient <span class="text-danger">#{{ $expedientCodi }}</span></h1>
        </div>
        @include('layouts.mensajes')
        <div class="selection">
            <div class='info-carta'>
                @if (Auth::check() && Auth::user()->roles->nom === 'Administrador Sistema')
                    <form
                        action='{{ action([App\Http\Controllers\CartaTrucadaHasAgenciaController::class, 'update'], ['infoCartum' => $carta->id]) }}'
                        method="POST">
                    @else
                        <form
                            action='{{ action([App\Http\Controllers\CartaTrucadaHasAgenciaSupController::class, 'update'], ['infoCartum' => $carta->id]) }}'
                            method="POST">
                @endif
                @csrf
                @method('PUT')
                <div class='cartaTrucada'>
                    <div class="wrapper">
                        <div class='title'>
                            <p>Carta <span>#</span> {{ $carta->codi_trucada }}</p>
                        </div>
                        <div class='time'>
                            {{-- <div class='timer'>
                                        <div class='startTime'>9:30</div>
                                        <img src="{{ Vite::asset('resources/icons/time.svg') }}">
                                        <div class='endTime'>9:41</div>
                                    </div> --}}
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
                            placeholder="{{ $carta->usuaris->username }}" disabled>
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
                                <textarea type="text" id="agency" class="form-control" disabled>{{ $cartaHasAgencia->agencies->nom }}</textarea>
                                <select class="form-select" name="estatAgencies{{ $cartaHasAgencia->agencies_id }}">
                                    @foreach ($estatAgencies as $estatAgencia)
                                        @if ($estatAgencia->id == $cartaHasAgencia->estatAgencies->id)
                                            <option selected value="{{ $cartaHasAgencia->estatAgencies->id }}">
                                                {{ $cartaHasAgencia->estatAgencies->estat }}
                                            </option>
                                        @else
                                            <option value="{{ $estatAgencia->id }}">
                                                {{ $estatAgencia->estat }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
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
            {{-- <div class='state' style="border: 4px solid {{ $expedientEstatColor }};">
                <div class='state-title' style="background-color: {{ $expedientEstatColor }}">
                    ESTAT
                    <img src="{{ Vite::asset('resources/icons/state.svg') }}">
                </div>
                <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}" style="height:inherit;">
                <div class='state-content'>{{ $expedientEstat }}</div>
            </div> --}}
        </div>
    </div>
</body>

</html>
