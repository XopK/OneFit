<!DOCTYPE html>
<html lang="ru">
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
                <h2 class="mb-3">Редактирование профиля</h2>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible mt-3">
                        <div class="alert-text">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                @endif
                <form action="/user/update" method="POST">
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control focus-ring focus-ring-warning border-warning" id="InputName"
                            name="name" placeholder="" value="{{Auth::user()->name}}">
                        <label for="InputName">Имя</label>
                        @error('name')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control focus-ring focus-ring-warning border-warning"
                            id="InputSurname" name="surname" placeholder="" value="{{Auth::user()->surname}}">
                        <label for="InputSurname" class="form-label">Фамилия</label>
                        @error('surname')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control focus-ring focus-ring-warning border-warning phone"
                            id="InputPhone" name="phone" placeholder="" value="{{Auth::user()->phone}}">
                        <label for="InputPhone" class="form-label">Номер телефона</label>
                        @error('phone')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control focus-ring focus-ring-warning border-warning"
                            id="InputPassword" name="password" placeholder="">
                        <label for="InputPassword" class="form-label">Новый пароль</label>
                        @error('password')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-warning">Изменить</button>
                    </div>
                </form>
                <h2>Ваши записи</h2>
                <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">№</th>
                            <th scope="col">Дата бронирования</th>
                            <th scope="col">Процедура</th>
                            <th scope="col">Статус</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->date }} {{ $application->time }}</td>
                                <td>{{ $application->procedure->title_procedure }}</td>
                                <td>{{ $application->status->title_status }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td>У вас нет записей</td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                </div>
                <div class="mt-3">{{ $data->withQueryString()->links('pagination::bootstrap-5') }}</div>
            </div>
        </div>
        <x-footer></x-footer>
    </div>
    <script>
        $(".phone").mask("+7(999)999-99-99");
    </script>
</body>
</html>
