<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Полезные материалы</a></li>
            <li><a href="#">Курсы</a></li>
            @if (Auth::check())
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <li><a href="#">Личный кабинет</a></li>
                        <button type="submit" class="admin-link">Выход</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="admin-link">Войти</a></li>
            @endif
        </ul>
    </nav>
</header>
