@extends('layouts.admin')

@section('content')
    <h1>Просмотр учителя</h1>

    <div>
        <strong>Номер:</strong> {{ $teacher->id }}
    </div>
    <div>
        <strong>Имя:</strong> {{ $teacher->first_name }}
    </div>
    <div>
        <strong>Фамилия:</strong> {{ $teacher->second_name }}
    </div>
    <div>
        <strong>Отчество:</strong> {{ $teacher->last_name }}
    </div>
    <div>
        <strong>Пол:</strong> {{ $teacher->sex == 'Мужчина' ? 'Мужской' : 'Женский' }}
    </div>
    <div>
        <strong>Дата рождения:</strong> {{ $teacher->date_birth }}
    </div>
    <div>
        <strong>Телефон:</strong> {{ $teacher->phone }}
    </div>
    <div>
        <strong>Почта:</strong> {{ $teacher->email }}
    </div>
    <div>
        <strong>Описание:</strong> {{ $teacher->description }}
    </div>
    <div>
        <strong>Фото:</strong><br>
        <img src="{{ asset('storage/images/dynamic/photos/' . $teacher->image_photo) }}" alt="Фото учителя" style="width: 150px; height: auto;">
    </div>

    <a href="{{ route('admin.teachers.index') }}" class="btn btn-secondary">Вернуться</a>
@endsection
