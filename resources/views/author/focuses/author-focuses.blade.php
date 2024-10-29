@extends('layouts.author')

@section('content')
    <h1 class="page-title">Учителя для курса</h1>
    <a href="{{ route('author.courses.index') }}" class="action-link secondary-action">Вернуться</a>
    <a href="{{ route('author.focuses.create', $course->id) }}" class="btn btn-primary">Создание для кого курс</a>
    <table class="admin-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Номер курса</th>
            <th>Для кого</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($focuses as $focus)
            <tr>
                <td>{{ $focus->id }}</td>
                <td>{{ $focus->course_id }}</td>
                <td>{{ $focus->for_whom }}</td>
                <td>
                    <form action="{{ route('author.focuses.show', $focus->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                    <form action="{{ route('author.focuses.edit', $focus->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action btn-edit">Изменить</button>
                    </form>
                    <form action="{{ route('author.focuses.destroy', $focus->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот объект?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginate-down-page">
        {{ $focuses->links() }}
    </div>
@endsection
