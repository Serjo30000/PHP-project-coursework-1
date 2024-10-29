@extends('layouts.author')

@section('content')
    <div class="view-container">
        <div class="info-card">
            <h1 class="view-title">Просмотр учителя для курса</h1>
            <a href="{{ route('author.course-teachers.allCourseTeachers', $course_teacher->course_id) }}" class="action-link secondary-action">Вернуться</a>

            <div class="info-item">
                <strong>Номер:</strong> <span>{{ $course_teacher->id }}</span>
            </div>
            <div class="info-item">
                <strong>Номер курса:</strong> <span>{{ $course_teacher->course_id }}</span>
            </div>
            <div class="info-item">
                <strong>Номер учителя:</strong> <span>{{ $course_teacher->teacher_id }}</span>
            </div>
        </div>
    </div>
@endsection
