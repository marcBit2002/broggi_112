<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
    @vite(['resources/css/app.scss', 'resources/css/menu.scss', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.navbar')

    <div class="container d-flex flex-column">
        <h1 class="text-center mt-5 text-primary fw-light">Menú</h1>
        <div id="container-items">
            <a href="">
                <img src="{{ Vite::asset('resources/icons/note.svg') }}">
                <p>crear carta</p>
            </a>
            <a href="">
                <img src="{{ Vite::asset('resources/icons/gears.svg') }}">
                <p>administrar</p>
            </a>
            <a href="">
                <img src="{{ Vite::asset('resources/icons/stats.svg') }}">
                <p>estadístiques</p>
            </a>
            <a href="">
                <img src="{{ Vite::asset('resources/icons/videos.svg') }}">
                <p>tutorials</p>
            </a>
        </div>
    </div>

</body>

</html>
