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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3 mt-3">
                    @forelse ($data as $procedure)
                    <div class="col">
                        <a href="/employee/{{$procedure->id}}/applications" style="text-decoration: none">
                            <div class="card shadow border-0" style="width: 18rem;">
                                <img src="/storage/procedure/{{$procedure->photo_spa}}" class="card-img-top ind-card-img" alt="{{$procedure->photo_spa}}">
                                <div class="card-body">
                                    <h5 class="card-title">{{$procedure->title_procedure}}</h5>
                                    <p class="card-text">{{$procedure->description}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <h5>Вас еще не прикрепили к процедурам</h5>
                    @endforelse
                </div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</body>
</html>
