<header class="client-header">
    <a href="{{ route('home') }}" class="client-header__logo">
        <img src="{{ asset('storage/images/static/logo.svg') }}" alt="Логотип">
    </a>
    <nav class="client-header__nav">
        <ul class="client-header__nav-list">
            <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('home') }}">Главная</a></li>
            <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('about') }}">О нас</a></li>
            <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('materials') }}">Полезные материалы</a></li>
            <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('client.client-course-types.index', ['type_id' => 1]) }}">Курсы</a></li>
            @if(Auth::check() && Auth::user()->hasRole('client')) <!-- Check if user has the 'client' role -->
                <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('home') }}">Корзина</a></li>
            @endif
            @if (Auth::check())
                <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('personalCabinet') }}">Личный кабинет</a></li>
                <li>
                    <a href="#" class="client-header__nav-link" id="logout-link">Выход</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @else
                <li class="client-header__nav-item"><a class="client-header__nav-link" href="{{ route('login') }}">Войти</a></li>
            @endif
        </ul>
    </nav>
</header>
<script>
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault();
        if (confirm('Вы уверены, что хотите выйти?')) {
            document.getElementById('logout-form').submit();
        }
    });
</script>
