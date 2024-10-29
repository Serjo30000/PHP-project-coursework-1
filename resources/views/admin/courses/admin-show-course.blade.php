@extends('layouts.admin')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр курса</h1>
            <a href="{{ route('admin.courses.index') }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $course->id }}</span>
            </div>
            <div class="info-item">
                <strong>Заголовок:</strong> <span>{{ $course->title }}</span>
            </div>
            <div class="info-item">
                <strong>Слоган:</strong> <span>{{ $course->slogan }}</span>
            </div>
            <div class="info-item">
                <strong>Количество недель:</strong> <span>{{ $course->count_week }}</span>
            </div>
            <div class="info-item">
                <strong>Цена:</strong> <span>{{ $course->price }}</span>
            </div>
            <div class="info-item">
                <strong>Статус лекций:</strong> <span>{{ $course->lecture_status }}</span>
            </div>
            <div class="info-item">
                <strong>Сложность:</strong> <span>{{ $course->complexity }}</span>
            </div>
            <div class="info-item">
                <strong>Номер типа курса:</strong> <span>{{ $course->course_type_id }}</span>
            </div>
            <div class="info-item">
                <strong>Описание:</strong> <span>{{ $course->description }}</span>
            </div>
            <div class="info-photo">
                <strong>Логотип:</strong><br>
                <img src="{{ asset('storage/images/dynamic/logo_courses/' . $course->image_logo) }}" alt="Фото">
            </div>
            <div class="info-photo">
                <strong>Баннер:</strong><br>
                <img src="{{ asset('storage/images/dynamic/banner_courses/' . $course->image_banner_course) }}" alt="Фото">
            </div>
            <div class="info-photo">
                <strong>Сертификат:</strong><br>
                <img src="{{ asset('storage/images/dynamic/certificates/' . $course->image_certificate) }}" alt="Фото">
            </div>
        </div>
    </div>
@endsection
