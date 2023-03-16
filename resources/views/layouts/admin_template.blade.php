<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/navbar_admin.scss'])

</head>

<body>
    @include('layouts.navbar')

    <div id="container">
        <div id="nav_container">
            <div class="title_container">
                <a href='{{ url('/menu') }}' id="back_arrow"><img
                        src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
                <p>ADMINISTRACIÓ</p>
            </div>
            <div id="items_contaienr">
                <a class="nav-link my-3" href="#">
                    <i class="bi bi-bar-chart-fill me-2"></i>Estadístiques</a>
                <a class="nav-link my-3" href="#">
                    <i class="bi bi-people-fill me-2"></i>Usuaris</a>
                <a class="nav-link my-3" href="#" selected>
                    <i class="bi bi-file-earmark-text-fill me-2"></i>Gestió d'expedients</a>
                <a class="nav-link my-3" href="#">
                    <i class="bi bi-fire me-2"></i>Incidents</a>
                <a class="nav-link my-3" href="#">
                    <i class="bi bi-grid-fill me-2"></i>Tipus d'incidents</a>
                <a class="nav-link my-3" href="#">
                    <i class="bi bi-briefcase-fill me-2"></i>Agències</a>
            </div>
        </div>
        <h2>@yield('titulo')</h2>
        <div id="content">
            @yield('contenido')
        </div>
    </div>
    <script type="module">
        import {
            playAnimation
        } from "{{ Vite::asset('resources/js/functions.js') }}";

        const animation = "fade-in-up 500ms ease forwards";
        const items = document.querySelectorAll("#items_contaienr a");

        playAnimation(animation,80,items,0,1);
    </script>
</body>

</html>
