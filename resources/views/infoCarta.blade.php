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
            <a class="p-2" href='{{ url('expedients/infoExpedient') }}' id="back_arrow"><img
                    src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
            <h1 class="text-primary ms-3 mb-0">Expedient <span class="text-danger">#YN872</span></h1>
        </div>
        <div class="selection">
            <div class='info-carta'>
                <form action=''>
                    <div class='cartaTrucada'>
                        <div class="wrapper">
                            <div class='title'>
                                <p>Carta <span>#</span> 435</p>
                            </div>
                            <div class='time'>
                                <div class='timer'>
                                    <div class='startTime'>9:30</div>
                                    <img src="{{ Vite::asset('resources/icons/time.svg') }}">
                                    <div class='endTime'>9:41</div>
                                </div>
                                <div class='totalTime'>120 segons</div>
                            </div>
                        </div>
                        <div class="phoneNumber">
                            <label for="phone" class="col-form-label">Telèfon</label>
                            <input type="text" id="phone" class="form-control" placeholder="+34 289302833"
                                disabled>
                        </div>
                        <div class="user">
                            <label for="user" class="col-form-label">Operador</label>
                            <input type="text" id="user" class="form-control" placeholder="Paula" disabled>
                        </div>

                        <div class="personName">
                            <label for="name" class="col-form-label">Nom i Cognoms</label>
                            <input type="text" id="name" class="form-control" placeholder="Maria Garriga"
                                disabled>
                        </div>

                        <div class="personAntecedents">
                            <label for="antecedents" class="col-form-label">Antecedents</label>
                            <input type="text" id="antecedents" class="form-control"
                                placeholder="Infermer de l'Hospital del Mar" disabled>
                        </div>

                        <div class="agencies">
                            <label for="agencies" class="col-form-label">Agències</label>
                            <div class='agencia'>
                                <input type="text" id="agency" class="form-control" placeholder="Policia Local"
                                    disabled>
                                <select class="form-select" aria-label="estatAgencies">
                                    <option value="1">Contactat</option>
                                    <option value="2">En procés</option>
                                    <option value="3" selected>Finalitzat</option>
                                </select>
                            </div>
                            <div class='agencia'>
                                <input type="text" id="agency" class="form-control" placeholder="Parc de Bombers"
                                    disabled>
                                <select class="form-select" aria-label="estatAgencies">
                                    <option value="1" selected>Contactat</option>
                                    <option value="2">En procés</option>
                                    <option value="3">Finalitzat</option>
                                </select>
                            </div>
                            <div class='agencia'>
                                <input type="text" id="agency" class="form-control"
                                    placeholder="Ambulància Hospital Vall de Hebron" disabled>
                                <select class="form-select" aria-label="estatAgencies">
                                    <option value="1">Contactat</option>
                                    <option value="2" selected>En procés</option>
                                    <option value="3">Finalitzat</option>
                                </select>
                            </div>
                        </div>

                        <div class="location">
                            <label for="location" class="col-form-label">Localització</label>
                            <input type="text" id="location" class="form-control"
                                placeholder="Avinguda Diagonal, 762, 7, 2. 08017, Barcelona" disabled>
                        </div>


                        <div class="incidentType">
                            <label for="incidentType" class="col-form-label">Tipus</label>
                            <input type="text" id="incidentType" class="form-control" placeholder="INCENDI" disabled>
                        </div>

                        <div class="notaComuna">
                            <label for="notaComuna" class="col-form-label">Nota Comuna:</label>
                            <textarea id="notaComuna" class="form-control" disabled>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie felis in facilisis maximus. Phasellus elementum arcu sed sem tristique, ut congue massa pharetra. Proin imperdiet dolor nulla, vitae fringilla ex placerat a. Praesent pretium viverra magna, id euismod dui imperdiet non. Praesent tristique dolor vitae enim tempus, nec sagittis neque maximus. Aenean in tempor elit. Etiam suscipit felis nec leo ullamcorper, semper sollicitudin nisi ornare. Donec gravida massa nibh, pharetra pulvinar tellus egestas vel.</textarea>
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
                    <div class='date-content'>29/12/27</div>
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
