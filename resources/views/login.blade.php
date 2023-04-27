<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{ Vite::asset('resources/img/favicon.ico') }}">
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/login.scss'])
</head>

<body>

    <div class="container">
        <div class="col-sm-10">
            @include('layouts.mensajes')
            <form class="login-form " action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}"
                method="post">
                @csrf
                <h4 class="text-center mb-4">Benvingut a <img src="{{ Vite::asset('resources/img/LogoBroggi.svg') }}">
                </h4>
                <p>Introdueix les dades per accedir</p>

                <div class="form-group">
                    <label for="username">usuari</label>
                    <div class="input-group">
                        <input type="text" maxlength="37" required class="form-control" id="username"
                            name="username" value="{{ old('username') }}" autofocus>
                        <span class="input-group-addon"><i class="bi bi-person"></i></span>
                    </div>
                </div>
                <div class="form-group mb-5">
                    <label for="contrasenya">constrasenya</label>
                    <div class="input-group">
                        <input type="password" maxlength="37" class="form-control" id="contrasenya" name="contrasenya"
                            required value="{{ old('contrasenya') }}">
                        <span class="input-group-addon"><i class="bi bi-lock"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-danger">ENTRAR</button>
            </form>
        </div>
    </div>
</body>

</html>
