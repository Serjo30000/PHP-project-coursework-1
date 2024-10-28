@extends('layouts.author')

@section('content')
    <h1 class="page-title">Курсы</h1>
{{--    <a href="{{ route('author.course-types.create') }}" class="btn btn-primary">Создание типа курсов</a>--}}
    <table class="teachers-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>
{{--                    <form action="{{ route('author.course-types.show', $course_type->id) }}" method="GET" style="display: inline;">--}}
{{--                        <button type="submit" class="btn-action">Посмотреть</button>--}}
{{--                    </form>--}}
{{--                    <form action="{{ route('author.course-types.edit', $course_type->id) }}" method="GET" style="display: inline;">--}}
{{--                        <button type="submit" class="btn-action">Изменить</button>--}}
{{--                    </form>--}}
{{--                    <form action="{{ route('author.course-types.destroy', $course_type->id) }}" method="POST" style="display:inline;">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button type="submit" class="btn-action btn-delete">Удалить</button>--}}
{{--                    </form>--}}
{{--                    <form action="{{ route('author.courses.allCourses', $course_type->id) }}" method="GET" style="display: inline;">--}}
{{--                        <button type="submit" class="btn-action">Курсы</button>--}}
{{--                    </form>--}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $courses->links() }}
@endsection
