<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadístiques</title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/favicon.ico') }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/graphs.scss'])
</head>

<body>
    @include('layouts.navbar')

    <div id="charts"></div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</html>
