@extends('layouts.admin')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр пользователя</h1>
            <a href="{{ route('admin.users.index') }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $user->id }}</span>
            </div>
            <div class="info-item">
                <strong>Логин:</strong> <span>{{ $user->login }}</span>
            </div>
            <div class="info-item">
                <strong>Почта:</strong> <span>{{ $user->email }}</span>
            </div>
            <div class="info-item">
                <strong>Телефон:</strong> <span>{{ $user->phone }}</span>
            </div>
            <div class="info-item">
                <strong>Имя:</strong> <span>{{ $user->first_name }}</span>
            </div>
            <div class="info-item">
                <strong>Фамилия:</strong> <span>{{ $user->second_name }}</span>
            </div>
            <div class="info-item">
                <strong>Отчество:</strong> <span>{{ $user->last_name }}</span>
            </div>
            <div class="info-item">
                <strong>Пол:</strong> <span>{{ $user->sex == 'Мужчина' ? 'Мужской' : 'Женский' }}</span>
            </div>
            <div class="info-item">
                <strong>Дата рождения:</strong> <span>{{ $user->date_birth }}</span>
            </div>
            <div class="info-item">
                <strong>Описание:</strong> <span>{{ $user->description }}</span>
            </div>
            <div class="info-item">
                <strong>Роль:</strong> <span>{{ $user->role }}</span>
            </div>
            <div class="info-photo">
                <strong>Аватар:</strong><br>
                <img src="{{ asset('storage/images/dynamic/avatars/' . $user->image_avatar) }}" alt="Фото">
            </div>
        </div>
    </div>
@endsection
