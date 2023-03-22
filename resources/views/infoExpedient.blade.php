<!DOCTYPE html>
<html lang='en'>

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
        <h1 class="text-primary">Expedients</h1>
        <div class="selection">
            <div class='expedient'>
                <div class='title'>Trucades</div>
                <div class='cartesTrucada'>
                    <div class='carta'>
                        <div class='type'>INCENDI</div>
                        <div class='place'>Santa Perpètua de Mogoda</div>
                        <div class='agencies'></div>
                    </div>
                    <div class='carta'>
                        <div class='type'>INCENDI</div>
                        <div class='place'>Santa Perpètua de Mogoda</div>
                        <div class='agencies'></div>
                    </div>
                    <div class='carta'>
                        <div class='type'>INCENDI</div>
                        <div class='place'>Santa Perpètua de Mogoda</div>
                        <div class='agencies'></div>
                    </div>
                </div>
            </div>
            <div class='dades'>
                <div class='title'>
                    <h2>Dades</h2>
                </div>
                <div class='date'>
                    <div class='date_title'></div>
                    <div class='date_content'></div>
                </div>
                <div class='type'>
                    <div class='type_title'></div>
                    <div class='type_content'></div>
                </div>
                <div class='state'>
                    <div class='state_title'></div>
                    <div class='state_content'></div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
