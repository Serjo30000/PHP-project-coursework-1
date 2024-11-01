@extends('layouts.app')

@section('title', 'Типы курсов')

@section('content')
    <div class="course-types">
        <h3 class="course-types__h3">ВИДЫ КУРСОВ</h3>
        @if(isset($courseTypes) && $courseTypes->isNotEmpty())
            <ul class="course-types__list">
                @foreach($courseTypes as $type)
                    <li class="course-types__item">
                        <form action="{{ route('client.client-course-types.index') }}" method="GET" style="display:inline;">
                            <input type="hidden" name="type_id" value="{{ $type->id }}">
                            <button type="submit" class="course-types__button">{{ $type->name }}</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Нет доступных типов курсов</p>
        @endif
    </div>
    <div class="course-buy-types">
        <h2>КУРСЫ ПО ВЫБРАННОМУ ТИПУ</h2>
        @if(isset($courses) && $courses->isNotEmpty())
            <ul class="course-buy-list">
                @foreach($courses as $course)
                    <li class="course-buy-card">
                        <div class="course-buy-header">
                            <img src="{{ asset('storage/images/dynamic/logo_courses/' . $course->image_logo) }}" alt="{{ $course->title }}" class="course-buy-logo">
                            <h3 class="course-buy-title">{{ $course->title }}</h3>
                        </div>
                        <div class="course-buy-info">
                            <p><strong>Кол-во недель:</strong>{{ ' ' . $course->count_week }}</p>
                            @php
                                $reviews = $course->reviews;
                                $grades = $reviews->pluck('grade');
                                $averageGrade = $grades->isNotEmpty() ? ceil($grades->avg()) : 5; // Default to 5 if no reviews
                            @endphp
                            <p><strong>Оценка: </strong>{{ ' ' . $averageGrade }}</p>
                            <p><strong>Сложность: </strong>{{ ' ' . $course->complexity }}</p>
                            <p><strong>Цена: </strong>{{ ' ' . $course->price }} Р</p>
                        </div>
                        <div class="course-buy-description">
                            <p><strong>Описание: </strong> {{ ' ' . $course->description }}</p>
                        </div>
                        <div class="course-buy-buttons">
                            <form action="{{ route('cart.add') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="course-buy-button">В корзину</button>
                            </form>
                            <form action="{{ route('client.client-show-course.show', $course->id) }}" method="GET" style="display: inline;">
                                <button type="submit" class="course-buy-button">Подробнее</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Выберите другой тип курса, чтобы увидеть доступные курсы.</p>
        @endif
    </div>
@endsection
