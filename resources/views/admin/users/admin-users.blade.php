@extends('layouts.admin')

@section('content')
    <h1 class="page-title">Пользователи</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Создание пользователя</a>
    <table class="teachers-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Логин</th>
            <th>Почта</th>
            <th>Телефон</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Пол</th>
            <th>День рождения</th>
            <th>Роль</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->login }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->second_name }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->sex }}</td>
                <td>{{ $user->date_birth }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <form action="{{ route('admin.users.show', $user->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline;">
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
        {{ $users->links() }}
    </div>
@endsection
