<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="post">
        @csfr
        <div class="mb-3">
            <label for="username" class="form-label">Usuari:</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}"
                autofocus>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="contrasenya" name="contrasenya"
                value="{{ old('contrasenya') }}">
        </div>
        <div class="col-sm-12 d-flex flex-row-reverse">
            <a href="{{ url('/') }}" class="btn btn-secondary float-right ms-1"><i class="bi bi-times"
                    aria-hidden="true"></i>Cancelar</a>
        </div>
        <button type="submit" class="btn btn-primary float-right"><i class="bi bi-check" aria-hidden="true"></i>
            Acceptar</button>
    </form>

</body>

</html>
