@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="personal-cabinet">
        @include('partials.menu-personal-cabinet')

        <div class="main-content">
            <h1>Личный кабинет</h1>
            <div class="profile-section" id="profile">
                <h2>Профиль</h2>
                <div class="profile-content">
                    <div class="profile-info">
                        <p><strong>Логин:</strong> {{ Auth::user()->login }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <p><strong>Телефон:</strong> {{ Auth::user()->phone }}</p>
                        <p><strong>Имя:</strong> {{ Auth::user()->first_name }}</p>
                        <p><strong>Фамилия:</strong> {{ Auth::user()->second_name }}</p>
                        @if(Auth::user()->last_name)
                            <p><strong>Отчество:</strong> {{ Auth::user()->last_name }}</p>
                        @endif
                        <p><strong>Пол:</strong> {{ Auth::user()->sex }}</p>
                        <p><strong>Дата рождения:</strong> {{ Auth::user()->date_birth }}</p>
                        <p><strong>Описание:</strong> {{ Auth::user()->description }}</p>
                    </div>
                    <div class="avatar">
                        <img src="{{ asset('storage/images/dynamic/avatars/' . Auth::user()->image_avatar) }}" alt="Аватар" />
                    </div>
                </div>
                <a href="{{ route('edit-account') }}" class="edit-button">Изменить данные</a>
                @if(Auth::user()->hasRole('client'))
                    <a href="{{ route('home') }}" class="edit-button">Главная</a>
                @endif
                @if(Auth::user()->hasRole('admin')) <!-- Check if user has the 'client' role -->
                <a href="{{ route('admin.users.index') }}" class="edit-button">Админ панель</a>
                @endif
                @if(Auth::user()->hasRole('author')) <!-- Check if user has the 'client' role -->
                <a href="{{ route('author.courses.index') }}" class="edit-button">Автор панель</a>
                @endif
            </div>
        </div>
    </div>
@endsection
