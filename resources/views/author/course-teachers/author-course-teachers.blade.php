@extends('layouts.author')

@section('content')
    <h1 class="page-title">Учителя для курса</h1>
    <a href="{{ route('author.courses.index') }}" class="action-link secondary-action">Вернуться</a>
    <a href="{{ route('author.course-teachers.create', $course->id) }}" class="btn btn-primary">Создание учителя для курса</a>
    <table class="admin-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Номер курса</th>
            <th>Номер учителя</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($course_teachers as $course_teacher)
            <tr>
                <td>{{ $course_teacher->id }}</td>
                <td>{{ $course_teacher->course_id }}</td>
                <td>{{ $course_teacher->teacher_id }}</td>
                <td>
                    <form action="{{ route('author.course-teachers.show', $course_teacher->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                    <form action="{{ route('author.course-teachers.edit', $course_teacher->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action btn-edit">Изменить</button>
                    </form>
                    <form action="{{ route('author.course-teachers.destroy', $course_teacher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот объект?');">
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
        {{ $course_teachers->links() }}
    </div>
@endsection
