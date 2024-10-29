@extends('layouts.admin')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр отзыва</h1>
            <a href="{{ route('admin.reviews.index') }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $review->id }}</span>
            </div>
            <div class="info-item">
                <strong>Оценка:</strong> <span>{{ $review->grade }}</span>
            </div>
            <div class="info-item">
                <strong>Заголовок:</strong> <span>{{ $review->title }}</span>
            </div>
            <div class="info-item">
                <strong>Комментарий:</strong> <span>{{ $review->text }}</span>
            </div>
            <div class="info-item">
                <strong>Номер курса:</strong> <span>{{ $review->course_id }}</span>
            </div>
            <div class="info-item">
                <strong>Номер пользователя:</strong> <span>{{ $review->user_id }}</span>
            </div>
        </div>
    </div>
@endsection
