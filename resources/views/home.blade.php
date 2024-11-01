@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <div class="course-banner">
        @if($randomCourse)
            <div class="course-banner__content">
                <h2 class="course-banner__title">{{ $randomCourse->title }}</h2>
                <p class="course-banner__slogan">{{ $randomCourse->slogan }}</p>
                <form action="{{ route('client.client-show-course.show', $randomCourse->id) }}" method="GET" style="display:inline;">
                    <button type="submit" class="submit-button-client-banner">Записаться на курс</button>
                </form>
                <p class="course-banner__description">{{ $randomCourse->description }}</p>
            </div>
            <div class="course-banner__image">
                <img src="{{ asset('storage/images/dynamic/banner_courses/' . $randomCourse->image_banner_course) }}" alt="{{ $randomCourse->title }} Banner" />
            </div>
        @else
            <p class="course-banner__no-courses">Нет доступных курсов</p>
        @endif
    </div>
    <div class="course-types">
        <h3 class="course-types__h3">ВИДЫ КУРСОВ</h3>
        @if(isset($courseTypes) && $courseTypes->isNotEmpty())
        <ul class="course-types__list">
            @foreach($courseTypes as $courseType)
                <li class="course-types__item">
                    <form action="{{ route('client.client-course-types.index') }}" method="GET" style="display:inline;">
                        <input type="hidden" name="type_id" value="{{ $courseType->id }}">
                        <button type="submit" class="course-types__button">{{ $courseType->name }}</button>
                    </form>
                </li>
            @endforeach
        </ul>
        @else
            <p>Нет доступных типов курсов</p>
        @endif
    </div>
@endsection
