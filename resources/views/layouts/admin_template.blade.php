<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/navbar_admin.scss', 'resources/css/modal.scss', 'resources/css/expedients.scss'])

</head>

<body>
    @include('layouts.navbar')

    <div id="container">
        @if (Auth::check() && Auth::user()->roles->nom === 'Administrador Sistema')
            <div id="nav_container">
                <div class="title_container">
                    <a href='{{ url('/menu') }}' id="back_arrow"><img
                            src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>
                    <p>ADMINISTRACIÓ</p>
                </div>
                <div id="items_contaienr">
                    <a class="nav-link my-3" href="#" @selected($activeNav === 'stats')>
                        <i class="bi bi-bar-chart-fill me-2"></i>Estadístiques</a>
                    <a class="nav-link my-3" href='{{ url('admin/usuari') }}'@selected($activeNav === 'usuaris')>
                        <i class="bi bi-people-fill me-2"></i>Usuaris</a>
                    <a class="nav-link my-3" href="{{ url('/admin/expedients') }}"@selected($activeNav === 'expedients')>
                        <i class="bi bi-file-earmark-text-fill me-2"></i>Gestió d'expedients</a>
                    <a class="nav-link my-3" href="{{ url('/admin/incidents') }}"@selected($activeNav === 'incidents')>
                        <i class="bi bi-fire me-2"></i>Incidents</a>
                    <a class="nav-link my-3" href="{{ url('/admin/tipusIncidents') }}"@selected($activeNav === 'tipos')>
                        <i class="bi bi-grid-fill me-2"></i>Tipus d'incidents</a>
                    <a class="nav-link my-3" href='{{ url('admin/agencies') }}'@selected($activeNav === 'agencies')>
                        <i class="bi bi-building-fill me-2"></i>Agències</a>
                </div>
            </div>
        @endif
        <div id="content">
            <h2>@yield('titulo')</h2>
            @yield('contenido')
        </div>
    </div>
    <script type="module">
        import {
            playAnimation
        } from "{{ Vite::asset('resources/js/functions.js') }}";

        const animation = "fade-in-up 500ms ease forwards";
        const items = document.querySelectorAll("#items_contaienr a");

        let play_animation = sessionStorage.getItem('admin_nav_animation');
        
        if (play_animation) {
            playAnimation(animation,80,items,0,1);
        } 
        sessionStorage.removeItem('admin_nav_animation');

    </script>
</body>

</html>
