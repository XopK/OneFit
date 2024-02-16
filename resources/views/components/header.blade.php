<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"
            style="font-size: 25px; font-family: 'Orbitron', sans-serif; color:rgb(49, 26, 5);">OneFit</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/procedures">Процедуры</a>
                </li>
            </ul>
        </div>
        <div class="collapse zigmund navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/reg">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/auth">Авторизация</a>
                    </li>
                @endguest
                @auth
                    @if (Auth::user()->id_role == 2)
                    <li class="nav-item">
                        <a class="nav-link" href="/employee">Мои записи</a>
                    </li>
                    @elseif (Auth::user()->id_role == 3)
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Личный кабинет</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Выйти</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
