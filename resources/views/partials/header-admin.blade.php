<header class="admin-header">
    <h1 class="admin-title">Админ панель</h1>
    <nav class="admin-nav">
        <ul class="admin-menu">
            <li><a href="{{ route('admin.users.index') }}" class="admin-link">Пользователи</a></li>
            <li><a href="{{ route('admin.teachers.index') }}" class="admin-link">Учителя</a></li>
            <li><a href="{{ route('admin.reviews.index') }}" class="admin-link">Отзывы</a></li>
            <li><a href="{{ route('admin.course-types.index') }}" class="admin-link">Типы курсов</a></li>
            <li>
                <a href="#" class="admin-link" id="logout-link">Выход</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
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
