<header class="admin-header">
    <h1 class="admin-title">Автор панель</h1>
    <nav class="admin-nav">
        <ul class="admin-menu">
            <li><a href="{{ route('author.courses.index') }}" class="admin-link">Курсы</a></li>
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
