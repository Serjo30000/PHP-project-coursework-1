@extends('layouts.author')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр для кого курс</h1>
            <a href="{{ route('author.focuses.allFocuses', $focus->course_id) }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $focus->id }}</span>
            </div>
            <div class="info-item">
                <strong>Номер курса:</strong> <span>{{ $focus->course_id }}</span>
            </div>
            <div class="info-item">
                <strong>Для кого:</strong> <span>{{ $focus->for_whom }}</span>
            </div>
        </div>
    </div>
@endsection
