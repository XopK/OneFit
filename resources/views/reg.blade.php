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
    <title>Регистрация</title>
</head>

<body>
    <x-header></x-header>
    <div class="container">
        <form action="/reg/create" method="POST">
            @csrf
            <div class="mb-3">
                <label for="InputName" class="form-label">Имя</label>
                <input type="text" class="form-control focus-ring focus-ring-warning border-warning" id="InputName"
                    name="name">
                @error('name')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputSurname" class="form-label">Фамилия</label>
                <input type="text" class="form-control focus-ring focus-ring-warning border-warning"
                    id="InputSurname" name="surname">
                @error('surname')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPhone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control focus-ring focus-ring-warning border-warning phone"
                    id="InputPhone" name="phone">
                @error('phone')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Почта</label>
                <input type="email" class="form-control focus-ring focus-ring-warning border-warning" id="InputEmail"
                    name="email">
                @error('email')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Пароль</label>
                <input type="password" class="form-control focus-ring focus-ring-warning border-warning"
                    id="InputPassword" name="password">
                @error('password')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ConfPassword" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control focus-ring focus-ring-warning border-warning"
                    id="ConfPassword" name="conf_password">
                @error('conf_password')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-warning">Зарегистрироваться</button>
        </form>
    </div>
    <script>
        $(".phone").mask("+7(999)999-99-99");
    </script>
</body>

</html>
