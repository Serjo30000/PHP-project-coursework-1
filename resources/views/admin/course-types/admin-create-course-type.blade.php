@extends('layouts.admin')

@section('content')
    <h1>Создание типа курсов</h1>
    <a href="{{ route('admin.course-types.index') }}">Вернуться</a>
    <form action="{{ route('admin.course-types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Название</label>
            <input type="text" name="name" value="{{ old('name', $course_type->name ?? '') }}" required>
        </div>
        <button type="submit">Создать</button>
    </form>
@endsection
