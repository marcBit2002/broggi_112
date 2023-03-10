<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel</title>
    @vite(['resources/css/app.scss', 'resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    @include('layouts.navbar')

    <button type="button" class="btn btn-outline-secondary m-3"><i class="bi bi-airplane-fill"></i>Descartar
        carta</button>
    <button type="button" class="btn btn-outline-primary m-3">Anterior</button>
    <button type="button" class="btn btn-danger m-3">Següent</button>

</body>

</html>
