@extends('layouts.admin')

@section('content')
    <h1>Создание учителя</h1>
    <a href="{{ route('admin.teachers.index') }}">Вернуться</a>
    <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="first_name">Имя</label>
            <input type="text" name="first_name" value="{{ old('first_name', $teacher->first_name ?? '') }}" required>
        </div>
        <div>
            <label for="second_name">Фамилия</label>
            <input type="text" name="second_name" value="{{ old('second_name', $teacher->second_name ?? '') }}" required>
        </div>
        <div>
            <label for="last_name">Отчество</label>
            <input type="text" name="last_name" value="{{ old('last_name', $teacher->last_name ?? '') }}" required>
        </div>
        <div>
            <label for="sex">Пол</label>
            <select name="sex" required>
                <option value="Мужчина" {{ (old('sex', $teacher->sex ?? '') == 'Мужчина') ? 'selected' : '' }}>Мужчина</option>
                <option value="Женщина" {{ (old('sex', $teacher->sex ?? '') == 'Женщина') ? 'selected' : '' }}>Женщина</option>
            </select>
        </div>
        <div>
            <label for="date_birth">Дата рождения</label>
            <input type="date" name="date_birth" value="{{ old('date_birth', $teacher->date_birth ?? '') }}" required>
        </div>
        <div>
            <label for="phone">Телефон</label>
            <input type="text" name="phone" value="{{ old('phone', $teacher->phone ?? '') }}">
        </div>
        <div>
            <label for="email">Почта</label>
            <input type="email" name="email" value="{{ old('email', $teacher->email ?? '') }}" required>
        </div>
        <div>
            <label for="description">Описание</label>
            <textarea name="description">{{ old('description', $teacher->description ?? '') }}</textarea>
        </div>
        <div>
            <label for="image_photo">Фото</label>
            <input type="file" name="image_photo">
        </div>
        <button type="submit">Создать</button>
    </form>
@endsection
