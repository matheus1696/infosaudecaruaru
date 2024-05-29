<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>

<body>
    <main>
        <video autoplay muted loop height="100%">
            <source src="assets/img/wallpaper.mp4" type="video/mp4">
        </video>

        <section class="row justify-content-center align-items-center h-100">
            <div class="text-center col-12">
                <img src="assets/img/intellectusLogo.png" alt="" width="100" class="elevation-3">
                <h1 class="p-2 text-light">{{env('APP_NAME')}}</h1>
                <div class="row justify-content-center">
                    <a href="{{route('login')}}" class="p-2 mx-2 mt-3 col-md-2 btn btn-sm btn-block btn-light elevation-3">Acessar Sistema</a>
                    <a href="{{route('contacts.index')}}" class="p-2 mx-2 mt-3 col-md-2 btn btn-sm btn-block btn-light elevation-3">Contatos</a>
                </div>
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
