@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Создание пользователя</h1>
        <a href="{{ route('admin.users.index') }}" class="action-link secondary-action">Вернуться</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            <div class="form-group">
                <label for="login">Логин*</label>
                <input type="text" name="login" value="{{ old('login', $user->login ?? '') }}" placeholder="Введите логин" required>
            </div>
            <div class="form-group">
                <label for="email">Почта*</label>
                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" placeholder="Введите почту (Ivan@mail.ru)" required>
            </div>
            <div class="form-group">
                <label for="phone">Телефон*</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone ?? '') }}" placeholder="Введите телефон (+71111111111/81111111111)" required>
            </div>
            <div class="form-group">
                <label for="first_name">Имя*</label>
                <input type="text" name="first_name" value="{{ old('first_name', $user->first_name ?? '') }}" placeholder="Введите имя" required>
            </div>
            <div class="form-group">
                <label for="second_name">Фамилия*</label>
                <input type="text" name="second_name" value="{{ old('second_name', $user->second_name ?? '') }}" placeholder="Введите фамилию" required>
            </div>
            <div class="form-group">
                <label for="last_name">Отчество</label>
                <input type="text" name="last_name" value="{{ old('last_name', $user->last_name ?? '') }}" placeholder="Введите отчество">
            </div>
            <div class="form-group">
                <label for="sex">Пол*</label>
                <select name="sex" required>
                    <option value="Мужчина" {{ (old('sex', $user->sex ?? '') == 'Мужчина') ? 'selected' : '' }}>Мужчина</option>
                    <option value="Женщина" {{ (old('sex', $user->sex ?? '') == 'Женщина') ? 'selected' : '' }}>Женщина</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_birth">Дата рождения*</label>
                <input type="date" name="date_birth" value="{{ old('date_birth', $user->date_birth ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="image_avatar">Аватар*</label>
                <input type="file" name="image_avatar" accept=".jpg, .jpeg">
            </div>
            <div class="form-group">
                <label for="password">Пароль*</label>
                <input type="password" name="password" placeholder="Введите пароль (мин. 10 символов)" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Подтверждение пароля*</label>
                <input type="password" name="password_confirmation" placeholder="Введите повторно пароль" required>
            </div>
            <div class="form-group">
                <label for="description">Описание*</label>
                <textarea name="description">{{ old('description', $user->description ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="role">Роль*</label>
                <select name="role" required>
                    <option value="author" {{ (old('role', $user->role ?? '') == 'author') ? 'selected' : '' }}>Автор</option>
                    <option value="admin" {{ (old('role', $user->role ?? '') == 'admin') ? 'selected' : '' }}>Админ</option>
                </select>
            </div>
            <button type="submit" class="submit-button">Создать</button>
        </form>
    </div>
@endsection
