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
    <div class='row row-cols-2'>
        <div class="col-2 border-end-4 border-primary me-2">
            <nav class="nav flex-column ms-3">
                <div class="text-primary mt-4 ms-2 me-4">
                    <h4><a id="back_arrow" class="me-2" href='{{ url('/menu') }}'><img class="me-2 mb-1"
                                src="{{ Vite::asset('resources/icons/back_arrow.svg') }}"></a>ADMINISTRACIÓ
                    </h4>
                    <hr class="border border-primary border-1 opacity-100 ms-n5 me-n4">
                </div>

                <div id="elements_container" class="nav-pills flex-column ">
                    <a class="nav-link mt-3 mb-3" href="#">
                        <i class="bi bi-bar-chart-fill me-2"></i>Estadístiques</a>
                    <a class="nav-link mt-3 mb-3" href="#" selected>
                        <i class="bi bi-people-fill me-2"></i>Usuaris</a>
                    <a class="nav-link mt-3 mb-3" href="#">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>Gestió d'expedients</a>
                    <a class="nav-link mt-3 mb-3" href="#">
                        <i class="bi bi-fire me-2"></i>Incidents</a>
                    <a class="nav-link mt-3 mb-3" href="#">
                        <i class="bi bi-grid-fill me-2"></i>Tipus d'incidents</a>
                    <a class="nav-link mt-3 mb-3" href="#">
                        <i class="bi bi-briefcase-fill me-2"></i>Agències</a>
                </div>
            </nav>
        </div>
        <div class='col-9 mt-5 ms-5'>
            @yield('contenido')
        </div>
    </div>
</body>

</html>
