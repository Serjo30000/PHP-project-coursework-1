@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Создание типа курсов</h1>
        <a href="{{ route('admin.course-types.index') }}" class="action-link secondary-action">Вернуться</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.course-types.store') }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            <div class="form-group">
                <label for="name">Название*</label>
                <input type="text" name="name" value="{{ old('name', $course_type->name ?? '') }}" placeholder="Введите название" required>
            </div>
            <button type="submit" class="submit-button">Создать</button>
        </form>
    </div>
@endsection
