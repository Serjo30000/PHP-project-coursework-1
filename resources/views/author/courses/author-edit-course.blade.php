@extends('layouts.author')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Изменение курса</h1>
        <a href="{{ route('author.courses.index') }}" class="action-link secondary-action">Вернуться</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('author.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Заголовок*</label>
                <input type="text" name="title" value="{{ old('title', $course->title ?? '') }}" placeholder="Введите заголовок" required>
            </div>
            <div class="form-group">
                <label for="slogan">Слоган*</label>
                <input type="text" name="slogan" value="{{ old('slogan', $course->slogan ?? '') }}" placeholder="Введите слоган" required>
            </div>
            <div class="form-group">
                <label for="count_week">Количество недель*</label>
                <input type="number" name="count_week" value="{{ old('count_week', $course->count_week ?? '') }}" min="1" placeholder="Введите кол-во недель" required>
            </div>
            <div class="form-group">
                <label for="count_lectures">Количество лекций*</label>
                <input type="number" name="count_lectures" value="{{ old('count_lectures', $course->count_lectures ?? '') }}" min="1" placeholder="Введите кол-во лекций" required>
            </div>
            <div class="form-group">
                <label for="count_seminars">Количество практик*</label>
                <input type="number" name="count_seminars" value="{{ old('count_seminars', $course->count_seminars ?? '') }}" min="1" placeholder="Введите кол-во практик" required>
            </div>
            <div class="form-group">
                <label for="count_online_classes">Количество онлайн занятий*</label>
                <input type="number" name="count_online_classes" value="{{ old('count_online_classes', $course->count_online_classes ?? '') }}" min="1" placeholder="Введите кол-во онлайн занятий" required>
            </div>
            <div class="form-group">
                <label for="price">Цена*</label>
                <input type="number" name="price" value="{{ old('price', $course->price ?? '') }}" min="0" step="0.01" placeholder="Введите цену" required>
            </div>
            <div class="form-group">
                <label for="lecture_status">Статус лекций*</label>
                <select name="lecture_status" required>
                    <option value="Предзаписанные" {{ (old('lecture_status', $course->lecture_status ?? '') == 'Предзаписанные') ? 'selected' : '' }}>Предзаписанные</option>
                    <option value="Непредзаписанные" {{ (old('lecture_status', $course->lecture_status ?? '') == 'Непредзаписанные') ? 'selected' : '' }}>Непредзаписанные</option>
                </select>
            </div>
            <div class="form-group">
                <label for="complexity">Сложность*</label>
                <select name="complexity" required>
                    <option value="Easy" {{ (old('complexity', $course->complexity ?? '') == 'Easy') ? 'selected' : '' }}>Легко</option>
                    <option value="Middle" {{ (old('complexity', $course->complexity ?? '') == 'Middle') ? 'selected' : '' }}>Средне</option>
                    <option value="Hard" {{ (old('complexity', $course->complexity ?? '') == 'Hard') ? 'selected' : '' }}>Сложно</option>
                </select>
            </div>
            <div class="form-group">
                <label for="course_type_id">Тип курса*</label>
                <select name="course_type_id" required>
                    @foreach ($courseTypes as $courseType)
                        <option value="{{ $courseType->id }}" {{ old('course_type_id') == $courseType->id ? 'selected' : '' }}>
                            {{ $courseType->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="image_logo">Логотип*</label>
                <input type="file" name="image_logo" accept=".jpg, .jpeg">
            </div>
            <div class="form-group">
                <label for="image_banner_course">Баннер*</label>
                <input type="file" name="image_banner_course" accept=".jpg, .jpeg">
            </div>
            <div class="form-group">
                <label for="image_certificate">Сертификат*</label>
                <input type="file" name="image_certificate" accept=".jpg, .jpeg">
            </div>
            <div class="form-group">
                <label for="description">Описание*</label>
                <textarea name="description">{{ old('description', $course->description ?? '') }}</textarea>
            </div>

            <button type="submit" class="submit-button">Изменить</button>
        </form>
    </div>
@endsection
