@extends('layouts.admin')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр учителя</h1>
            <a href="{{ route('admin.teachers.index') }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $teacher->id }}</span>
            </div>
            <div class="info-item">
                <strong>Имя:</strong> <span>{{ $teacher->first_name }}</span>
            </div>
            <div class="info-item">
                <strong>Фамилия:</strong> <span>{{ $teacher->second_name }}</span>
            </div>
            <div class="info-item">
                <strong>Отчество:</strong> <span>{{ $teacher->last_name }}</span>
            </div>
            <div class="info-item">
                <strong>Пол:</strong> <span>{{ $teacher->sex == 'Мужчина' ? 'Мужской' : 'Женский' }}</span>
            </div>
            <div class="info-item">
                <strong>Дата рождения:</strong> <span>{{ $teacher->date_birth }}</span>
            </div>
            <div class="info-item">
                <strong>Телефон:</strong> <span>{{ $teacher->phone }}</span>
            </div>
            <div class="info-item">
                <strong>Почта:</strong> <span>{{ $teacher->email }}</span>
            </div>
            <div class="info-item">
                <strong>Описание:</strong> <span>{{ $teacher->description }}</span>
            </div>
            <div class="info-photo">
                <strong>Фото:</strong><br>
                <img src="{{ asset('storage/images/dynamic/photos/' . $teacher->image_photo) }}" alt="Фото">
            </div>
        </div>
    </div>
@endsection
