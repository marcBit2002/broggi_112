<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BROGGI-112</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js', 'resources/css/splash.scss'])

</head>

<body>
    <div class="splash">
        <div class="spinner-border text-primary" role="status">
            {{-- <span class="sr-only"></span> --}}
        </div>
    </div>

</body>
<script>
    setTimeout(function() {
        window.location.href = "{{ route('login') }}";
    }, 2000); // Redirigir después de 5 segundos
</script>


</html>
