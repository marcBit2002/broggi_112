<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<body>
    <style>
        /* Estilos para el formulario de inicio de sesión */

        .login-form {
            background-color: #ffffff;
            border-radius: 8px;
            border: solid #087CA7;
            padding: 30px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;

        }

        .login-form h4 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 30px;
            color: #087CA7;
        }

        .login-form p {
            text-align: center;
            color: #767676;
            font-size: 14px;
            margin-bottom: 50px;
        }

        .form-group {
            margin-bottom: 30px;
        }

        label {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
            color: #087CA7;
        }

        .form-control {
            border: none;
            border-bottom: 1px solid #087CA7;
            padding: 10px 15px;
            font-size: 16px;
            background: none;
            width: 100%;
            transition: border-color 0.4s ease-out;
            border-radius: 5px;
        }

        .form-control:focus {
            border-color: #FFB300;
        }

        .login-form button[type="submit"] {
            border: none;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 12px;
            font-weight: 400;
            margin-top: 30px;
            width: 100%
        }

        .login-form button[type="submit"]:hover {
            cursor: pointer;
        }

        /* Estilos para los iconos de los inputs */
        .input-group-addon {
            border: none;
            border-radius: 5px;
            padding: 10px;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 10;
        }

        .input-group-addon i {
            color: #FFB300;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-10">
                <form class="login-form "
                    action="{{ action([App\Http\Controllers\UsuarioController::class, 'login']) }}" method="post">
                    @csrf
                    <h4 class="text-center mb-4">Benvingut a BROGGI-112</h4>
                    <p>Introdueix les dades per accedir</p>

                    <div class="form-group">
                        <label for="username">usuari</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ old('username') }}" autofocus>
                            <span class="input-group-addon"><i class="bi bi-person"></i></span>
                        </div>
                    </div>
                    <div class="form-group mb-5">
                        <label for="contrasenya">constrasenya</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="contrasenya" name="contrasenya"
                                value="{{ old('contrasenya') }}">
                            <span class="input-group-addon"><i class="bi bi-lock"></i></span>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger">ENTRAR</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
