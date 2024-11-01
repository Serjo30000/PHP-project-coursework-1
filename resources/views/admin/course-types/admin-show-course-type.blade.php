@extends('layouts.admin')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр типа курсов</h1>
            <a href="{{ route('admin.course-types.index') }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $course_type->id }}</span>
            </div>
            <div class="info-item">
                <strong>Название:</strong> <span>{{ $course_type->name }}</span>
            </div>
        </div>
    </div>
@endsection
