@extends('layouts.admin')

@section('content')
    <h1 class="page-title">Типы курсов</h1>
    <a href="{{ route('admin.course-types.create') }}" class="btn btn-primary">Создание типа курсов</a>
    <table class="teachers-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Название</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($course_types as $course_type)
            <tr>
                <td>{{ $course_type->id }}</td>
                <td>{{ $course_type->name }}</td>
                <td>
                    <form action="{{ route('admin.course-types.show', $course_type->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                    <form action="{{ route('admin.course-types.edit', $course_type->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Изменить</button>
                    </form>
                    <form action="{{ route('admin.course-types.destroy', $course_type->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $course_types->links() }}
@endsection
