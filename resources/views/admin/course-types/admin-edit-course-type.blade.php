@extends('layouts.admin')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Изменение типа курсов</h1>
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

        <form action="{{ route('admin.course-types.update', $course_type->id) }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" value="{{ old('name', $course_type->name ?? '') }}" required>
            </div>

            <button type="submit" class="submit-button">Изменить</button>
        </form>
    </div>
@endsection
