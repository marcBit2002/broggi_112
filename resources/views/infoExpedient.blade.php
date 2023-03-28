<!DOCTYPE html>
<html>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Gestió Expedients</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/navbar_admin.scss', 'resources/css/info_expedient.scss'])
</head>

<body>
    @include('layouts.navbar')

    <div class='content'>
        <div style="display: flex; align-items:center;">
            <a class="p-2" href='{{ url('admin/expedients') }}' id="back_arrow"><img
                    src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
            <h1 class="text-primary ms-3 mb-0">Expedient <span class="text-danger">#{{ $expedient->codi }}</span></h1>
        </div>
        <div class="selection">
            <div class='expedient'>
                <div class='title'>Trucades</div>
                <div class='cartesTrucada'>
                    @foreach ($expedient->cartesTrucades as $carta)
                        <div class='carta'>
                            <a class="nav-link" 
                                href="{{ action([App\Http\Controllers\Api\CartaController::class, 'show'], ['cartum' => $carta->id]) }}">
                                <img src="{{ Vite::asset('resources/icons/carta.svg') }}">
                                <div class='carta_type'>
                                    <p>INCIDÈNCIA</p>{{ $carta->incidents->tipus_incidents->nom }}
                                </div>
                                <div class='carta_place'><i class="bi bi-geo-alt-fill"></i>{{ $carta->municipis->nom }}
                                </div>
                                <div class='carta_agencies'>
                                    <div class='agencia'>Policia<span class="dot"></div>
                                    <div class='agencia'>Bombers<span class="dot"></div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
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
                    <div class='date-content'>
                        @foreach ($datesUq as $date)
                            {{ $date }}<br>
                        @endforeach
                    </div>
                </div>
                <div class='type'>
                    <div class='type-title'>
                        TIPUS
                        <img src="{{ Vite::asset('resources/icons/type.svg') }}">
                    </div>
                    <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}">
                    <div class='type-content'>
                        @foreach ($tipusIncidentsUq as $tipusIncident)
                            {{ $tipusIncident }},<br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class='state'>
                <div class='state-title'>
                    ESTAT
                    <img src="{{ Vite::asset('resources/icons/state.svg') }}">
                </div>
                <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}" style="height:inherit;">
                <div class='state-content'>{{ $expedient->estatExpedient->estat }}</div>
            </div>
        </div>
    </div>
</body>

</html>
