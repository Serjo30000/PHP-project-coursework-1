@extends('layouts.admin')

@section('content')
    <h1>Изменение типа курсов</h1>
    <a href="{{ route('admin.course-types.index') }}">Вернуться</a>
    <form action="{{ route('admin.course-types.update', $course_type->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Название</label>
            <input type="text" name="name" value="{{ old('name', $course_type->name ?? '') }}" required>
        </div>
        <button type="submit">Изменить</button>
    </form>
@endsection
