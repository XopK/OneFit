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
            </div>
        </div>
        <x-footer></x-footer>
    </div>
</body>
</html>
