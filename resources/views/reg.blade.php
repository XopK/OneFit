<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="/style/style.css">
    <title>Регистрация</title>
</head>
<body>
    <x-header></x-header>
    <div class="container">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="InputName" class="form-label">Имя</label>
                <input type="text" class="form-control focus-ring focus-ring-warning border-warning" id="InputName" name="name">
            </div>
            <div class="mb-3">
                <label for="InputSurname" class="form-label">Фамилия</label>
                <input type="text" class="form-control focus-ring focus-ring-warning border-warning" id="InputSurname" name="surname">
            </div>
            <div class="mb-3">
                <label for="InputPhone" class="form-label">Номер телефона</label>
                <input type="text" class="form-control focus-ring focus-ring-warning border-warning" id="InputPhone" name="phone">
            </div>
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Почта</label>
                <input type="email" class="form-control focus-ring focus-ring-warning border-warning" id="InputEmail" name="email">
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Пароль</label>
                <input type="password" class="form-control focus-ring focus-ring-warning border-warning" id="InputPassword" name="password">
            </div>
            <div class="mb-3">
                <label for="ConfPassword" class="form-label">Подтверждение пароля</label>
                <input type="password" class="form-control focus-ring focus-ring-warning border-warning" id="ConfPassword" name="conf_password">
            </div>
            <button type="submit" class="btn btn-warning">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>