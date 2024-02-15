<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="/style/style.css">
    <title>OneFit</title>
</head>

<body>
    <div class="wrapper">
    <x-header></x-header>
    <div class="main-block">
    <div class="container">
        <div class="row mt-5 mb-3">
            <div class="col-12 col-md-6">
                <img class="procedure-img" src="/storage/procedure/{{$data->photo_spa}}" alt="{{$data->photo_spa}}">
            </div>
            <div class="col-12 col-md-6">
                <p class="procedure-title">{{$data->title_procedure}}</p>
                <p class="procedure-desc">{{$data->description}}</p>
                <div class="d-flex justify-content-center mb-5">
                    @auth
                    <a class="btn btn-warning" href="/time/{{$data->id}}">Записаться</a>
                    @endauth
                    @guest
                    <a class="btn btn-warning" href="/auth">Войдите для записи</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    </div>
    <x-footer></x-footer>
    </div>
</body>



</html>
