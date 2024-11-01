<div class="sidebar">
    <h2>Навигация</h2>
    <ul class="sidebar-menu">
        <li><a href="{{ route('personalCabinet') }}">Профиль</a></li>
        @if(Auth::user()->hasRole('client'))
        <li><a href="{{ route('myCourses') }}">Мои курсы</a></li>
        @endif
    </ul>
</div>
