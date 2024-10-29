@extends('layouts.author')

@section('content')
    <h1 class="page-title">Курсы</h1>
    <a href="{{ route('author.courses.create') }}" class="btn btn-primary">Создание курса</a>
    <table class="admin-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Заголовок</th>
            <th>Цена</th>
            <th>Номер курса типа</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->title }}</td>
                <td>{{ $course->price }}</td>
                <td>{{ $course->course_type_id }}</td>
                <td>
                    <form action="{{ route('author.courses.show', $course->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                    <form action="{{ route('author.courses.edit', $course->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Изменить</button>
                    </form>
                    <form action="{{ route('author.courses.destroy', $course->id) }}" method="POST" style="display:inline;">
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
        {{ $courses->links() }}
    </div>
@endsection
