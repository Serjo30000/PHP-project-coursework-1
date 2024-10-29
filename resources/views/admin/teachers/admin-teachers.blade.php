@extends('layouts.admin')

@section('content')
    <h1 class="page-title">Учителя</h1>
    <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">Создание учителя</a>
    <table class="teachers-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>День рождения</th>
            <th>Телефон</th>
            <th>Почта</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->id }}</td>
                <td>{{ $teacher->second_name }}</td>
                <td>{{ $teacher->first_name }}</td>
                <td>{{ $teacher->last_name }}</td>
                <td>{{ $teacher->sex }}</td>
                <td>{{ $teacher->date_birth }}</td>
                <td>{{ $teacher->phone }}</td>
                <td>{{ $teacher->email }}</td>
                <td>
                    <form action="{{ route('admin.teachers.show', $teacher->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                    <form action="{{ route('admin.teachers.edit', $teacher->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Изменить</button>
                    </form>
                    <form action="{{ route('admin.teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
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
        {{ $teachers->links() }}
    </div>
@endsection
