<header class="admin-header">
    <h1 class="admin-title">Админ панель</h1>
    <nav class="admin-nav">
        <ul class="admin-menu">
            <li><a href="{{ route('admin.users.index') }}" class="admin-link">Пользователи</a></li>
            <li><a href="{{ route('admin.teachers.index') }}" class="admin-link">Учителя</a></li>
            <li><a href="{{ route('admin.reviews.index') }}" class="admin-link">Отзывы</a></li>
            <li><a href="{{ route('admin.course-types.index') }}" class="admin-link">Типы курсов</a></li>
        </ul>
    </nav>
</header>
