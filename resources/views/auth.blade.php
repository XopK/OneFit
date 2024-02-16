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
    <title>Авторизация</title>
</head>

<body>
    <x-header></x-header>
    <div class="container">
        <div class="d-flex justify-content-center mb-3">
            <h2>Авторизация</h2>
        </div>
        <form action="/auth/login" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="phone"
                    class="phone form-control focus-ring focus-ring-warning border-warning" id="InputEmail"
                    placeholder="">
                <label for="InputEmail" class="form-label">Номер телефона</label>
                @error('phone')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control focus-ring focus-ring-warning border-warning"
                    id="InputPassword" placeholder="">
                <label for="InputPassword" class="form-label">Пароль</label>
                @error('phone')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-warning">Войти</button>
            </div>
        </form>
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible mt-3">
                <div class="alert-text">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            </div>
        @endif
    </div>
    <script>
        $(".phone").mask("+7(999)999-99-99");
    </script>
</body>

</html>
