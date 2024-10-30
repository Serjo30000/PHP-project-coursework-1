@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Изменение аккаунта</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('edit-account') }}" method="POST" enctype="multipart/form-data" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" value="{{ Auth::user()->login }}" required>
            </div>
            <div class="form-group">
                <label for="email">Почта</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" required>
            </div>
            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
            </div>
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" value="{{ Auth::user()->first_name }}" required>
            </div>
            <div class="form-group">
                <label for="second_name">Фамилия</label>
                <input type="text" name="second_name" value="{{ Auth::user()->second_name }}" required>
            </div>
            <div class="form-group">
                <label for="last_name">Отчество</label>
                <input type="text" name="last_name" value="{{ Auth::user()->last_name }}" required>
            </div>
            <div class="form-group">
                <label for="sex">Пол</label>
                <select name="sex" required>
                    <option value="Мужчина" {{ Auth::user()->sex == 'Мужчина' ? 'selected' : '' }}>Мужчина</option>
                    <option value="Женщина" {{ Auth::user()->sex == 'Женщина' ? 'selected' : '' }}>Женщина</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date_birth">Дата рождения</label>
                <input type="date" name="date_birth" value="{{ Auth::user()->date_birth }}" required>
            </div>
            <div class="form-group">
                <label for="image_avatar">Аватар</label>
                <input type="file" name="image_avatar">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="password_confirmation">Подтверждение пароля</label>
                <input type="password" name="password_confirmation" required>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea name="description">{{ Auth::user()->description }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button-client">Изменить аккаунт</button>
            </div>
            <div class="register-link">
                <p>Передумали менять аккаунт? <a href="{{ route('personalCabinet') }}">Вернуться</a></p>
            </div>
        </form>
    </div>
@endsection
