@extends('layouts.app')

@section('title', 'Личный кабинет')

@section('content')
    <div class="personal-cabinet">
        @include('partials.menu-personal-cabinet')

        <div class="main-content">
            <h1>Личный кабинет</h1>
            <div class="profile-section" id="profile">
                <h2>Мои курсы</h2>
                <div class="profile-content">
                    <ul>
                        @foreach($courses as $index => $course)
                            <li class="course-card">
                                <div class="course-logo">
                                    <img src="{{ asset('storage/images/dynamic/logo_courses/' . $course->image_logo) }}" alt="{{ $course->title }}" />
                                </div>
                                <div class="course-info">
                                    <span class="course-number">{{ $index + 1 }}.</span>
                                    <span class="course-title">{{ 'Курс: ' . $course->title }}</span>
                                    <span class="course-title">{{ 'Слоган: ' . $course->slogan }}</span>
                                    <span class="course-title">{{ 'Сложность: ' . $course->complexity }}</span>
                                    <span class="course-title">{{ 'Цена: ' . $course->price }}</span>
                                    <span class="course-title">{{ 'Кол-во недель: ' . $course->count_week }}</span>
                                    <span class="course-title">{{ 'Кол-во лекций: ' . $course->count_lectures }}</span>
                                    <span class="course-title">{{ 'Кол-во практик: ' . $course->count_seminars }}</span>
                                    <span class="course-title">{{ 'Кол-во онлайн занятий: ' . $course->count_online_classes }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="paginate-down-page">
                    {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
