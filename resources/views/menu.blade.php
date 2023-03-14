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
        <h1 class="text-center mt-5 text-primary fw-light"><span class="text-danger fw-bold">></span> Menú</h1>
        <div id="container-items">
            <a href="">
                <img src="https://picsum.photos/120">
                <p>crear carta</p>
            </a>
            <a href="">
                <img src="https://picsum.photos/120">
                <p>administrar</p>
            </a>
            <a href="">
                <img src="https://picsum.photos/120">
                <p>estadístiques</p>
            </a>
            <a href="">
                <img src="https://picsum.photos/120">
                <p>tutorials</p>
            </a>
        </div>
    </div>

</body>

</html>
