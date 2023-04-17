<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menú</title>
    @vite(['resources/css/app.scss', 'resources/css/menu.scss', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navbar')

    <div class="container d-flex flex-column">
        <h1 class="text-center mt-5 text-primary fw-light">Menú</h1>
        <div id="container-items">
            @if (Auth::check() && Auth::user()->roles->nom === 'Administrador Sistema')
                <a href="{{ url('carta') }}">
                    <img src="{{ Vite::asset('resources/icons/note.svg') }}">
                    <p>crear carta</p>
                </a>

                <a id="administrar" href="{{ url('admin/usuari') }}">
                    <img src="{{ Vite::asset('resources/icons/gears.svg') }}">
                    <p>administrar</p>
                </a>
            @elseif (Auth::check() && Auth::user()->roles->nom === 'Supervisor 112')
                <a href="{{ url('carta') }}">
                    <img src="{{ Vite::asset('resources/icons/note.svg') }}">
                    <p>crear carta</p>
                </a>

                <a href="{{ url('/expedients') }}">
                    <img src="{{ Vite::asset('resources/icons/expedients.svg') }}">
                    <p>expedients</p>
                </a>
            @else
                <a href="{{ url('carta') }}" style="grid-area: 1 / 1 / 2 / 3;">
                    <img src="{{ Vite::asset('resources/icons/note.svg') }}">
                    <p>crear carta</p>
                </a>
            @endif

            <a href="{{ url('stats') }}">
                <img src="{{ Vite::asset('resources/icons/stats.svg') }}">
                <p>estadístiques</p>
            </a>
            <a href="">
                <img src="{{ Vite::asset('resources/icons/videos.svg') }}">
                <p>tutorials</p>
            </a>
        </div>
    </div>
    <script type="module">
        import {
            playAnimation
        } from "{{ Vite::asset('resources/js/functions.js') }}";

        const animation = "fade-in-up 500ms ease forwards";
        const items = document.querySelectorAll("#container-items a");

        playAnimation(animation,80,items,0,1);

        const admin_btn = document.querySelector("#administrar");
      if (admin_btn != null) {
        admin_btn.addEventListener('click', () => {
            sessionStorage.setItem('admin_nav_animation', true);
        });
      }

    </script>
</body>

</html>
