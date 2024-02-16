<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body>
    <div class="wrapper">
        <x-header></x-header>
        <div class="container main-block">
            @php
            $times = [];
            $dates = [];
            $monthNames = [
                'января', 'февраля', 'марта', 'апреля', 'мая', 'июня',
                'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'
            ];
            $dayNames = [
                'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
                'Четверг', 'Пятница', 'Суббота'
            ];
            for ($i = 0; $i < 10; $i++) {
                $date = date("j ", strtotime("+$i day")) . $monthNames[date("n", strtotime("+$i day")) - 1] . ' ' . $dayNames[date("w", strtotime("+$i day"))];
                $dates[] = $date;
            }
            $ti = strtotime('10:00');
            for ($i = 0; $i < 12; $i++) {
                $time = date('H:i', $ti);
                $times[] = $time;
                $ti = strtotime('+1 hour', $ti);
            }
            @endphp
            <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        @foreach ($dates as $date)
                            <td class="table-primary">{{$date}}</td>
                        @endforeach
                    </tr>
                    @foreach ($times as $time)
                        <tr>
                            @foreach ($dates as $date)
                            @php
                                $application = App\Models\Application::where('date', $date)->where('time', $time)->where('id_procedure', $data->id)->first();
                                $isBooked = $application ? $application->isBooked() : false;
                            @endphp
                                @if ($isBooked)
                                <td class="table-danger">
                                    <button class="time-btn">{{$time}}</button>
                                </td>
                                @else
                                <td class="table-success">
                                    <button class="time-btn" data-date="{{$date}}" data-time="{{$time}}" data-bs-toggle="modal" data-bs-target="#application" type="button">{{$time}}</button>
                                </td>
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <x-footer></x-footer>
        <div class="modal fade" id="application" tabindex="-1" aria-labelledby="application" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0" style="background-color: rgb(241,235,222); color:rgb(49, 26, 5);">
                    <div class="modal-header border-0">
                        <h1>Бронирование</h1>
                        <button type="button" class="btn-close focus-ring focus-ring-warning border-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <form action="/application/create" method="POST">
                        @csrf
                        <div class="modal-body border-0">
                                <input type="hidden" name="id_procedure" value="{{$data->id}}">
                                <input type="hidden" name="date" id="modalInputDate">
                                <input type="hidden" name="time" id="modalInputTime">
                                <p>{{$data->title_procedure}}</p>
                                <p id="modalDate"></p>
                                <p id="modalTime"></p>
                                <p>Цена: {{$data->cost}} руб.</p>
                        </div>
                        <div class="modal-footer justify-content-center border-0">
                            <button type="submit" class="btn btn-warning btn-lg">Забронировать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var buttons = document.querySelectorAll(".time-btn");
            buttons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var date = button.dataset.date;
                    var time = button.dataset.time;
                    var dateString = "Дата: " + date;
                    var timeString = "Время: " + time;
                    document.getElementById("modalDate").innerHTML = dateString;
                    document.getElementById("modalTime").innerHTML = timeString;
                    document.getElementById("modalInputDate").value = date;
                    document.getElementById("modalInputTime").value = time;
                    var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                    myModal.show();
                });
            });
        });
    </script>
</body>
</html>


