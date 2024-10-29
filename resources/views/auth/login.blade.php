@extends('layouts.app')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Вход в систему</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button">Войти</button>
            </div>
        </form>
    </div>
@endsection
