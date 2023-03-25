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
        <a href='{{ url('admin/expedients') }}' id="back_arrow"><img
                src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
        <h1 class="text-primary">Expedient <span class="text-danger">#YN872</span></h1>
        <div class="selection">
            <div class='expedient'>
                <div class='title'>Trucades</div>
                <div class='cartesTrucada'>
                    <div class='carta'>
                        <a class="nav-link" href="{{ url('infoExpedient/infoCarta') }}">
                            <img src="{{ Vite::asset('resources/icons/carta.svg') }}">
                            <div class='carta_type'>
                                <p>INCIDÈNCIA</p>INCENDI
                            </div>
                            <div class='carta_place'><i class="bi bi-geo-alt-fill"></i>Santa Perpètua de Mogoda</div>
                            <div class='carta_agencies'>
                                <div class='agencia'>Policia<span class="dot"></div>
                                <div class='agencia'>Bombers<span class="dot"></div>
                            </div>
                        </a>
                    </div>
                    <div class='carta'>
                        <a class="nav-link" href="{{ url('infoExpedient/infoCarta') }}">
                            <img src="{{ Vite::asset('resources/icons/carta.svg') }}">
                            <div class='carta_type'>
                                <p>INCIDÈNCIA</p>ROBATORI
                            </div>
                            <div class='carta_place'><i class="bi bi-geo-alt-fill"></i>Santa Perpètua de Mogoda</div>
                            <div class='carta_agencies'>
                                <div class='agencia'>Bombers<span class="dot"></div>
                                <div class='agencia'>Ambulància<span class="dot"></div>
                            </div>
                        </a>
                    </div>
                    <div class='carta'>
                        <a class="nav-link" href="{{ url('infoExpedient/infoCarta') }}">
                            <img src="{{ Vite::asset('resources/icons/carta.svg') }}">
                            <div class='carta_type'>
                                <p>INCIDÈNCIA</p>INCENDI
                            </div>
                            <div class='carta_place'><i class="bi bi-geo-alt-fill"></i>Santa Perpètua de Mogoda</div>
                            <div class='carta_agencies'>
                                <div class='agencia'>Policia<span class="dot"></div>
                                <div class='agencia'>Bombers<span class="dot"></div>
                                <div class='agencia'>Ambulància<span class="dot"></div>
                                <div class='agencia'>Policia<span class="dot"></div>
                            </div>
                        </a>
                    </div>
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
                    <div class='date-content'>29/12/27</div>
                </div>
                <div class='type'>
                    <div class='type-title'>
                        TIPUS
                        <img src="{{ Vite::asset('resources/icons/type.svg') }}">
                    </div>
                    <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}">
                    <div class='type-content'>FUITA (AIGUA, GAS, ALTRES)</div>
                </div>
                <div class='type'>
                    <div class='type-title'>
                        TIPUS
                        <img src="{{ Vite::asset('resources/icons/type.svg') }}">
                    </div>
                    <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}">
                    <div class='type-content'>ASSISTÈNCIA SANITÀRIA, INCENDI, ROBATORI, SDGADFH</div>
                </div>
            </div>
            <div class='state'>
                <div class='state-title'>
                    ESTAT
                    <img src="{{ Vite::asset('resources/icons/state.svg') }}">
                </div>
                <img src="{{ Vite::asset('public/assets/icons/arrowHeadFill.svg') }}" style="height:inherit;">
                <div class='state-content'>IMMOBILITZAT</div>
            </div>
        </div>
    </div>
</body>

</html>
