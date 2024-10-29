@extends('layouts.author')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Изменение учителя для курса</h1>
        <a href="{{ route('author.course-teachers.allCourseTeachers',$course_teacher->course_id) }}" class="action-link secondary-action">Вернуться</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('author.course-teachers.update', $course_teacher->id) }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="course_id">Курса</label>
                <select name="course_id" required>
                    @foreach ($courses as $courseEl)
                        <option value="{{ $courseEl->id }}" {{ old('course_id') == $courseEl->id ? 'selected' : '' }}>
                            {{ $courseEl->id . ' ' . $courseEl->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="teacher_id">Учитель</label>
                <select name="teacher_id" required>
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                            {{ $teacher->email }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="submit-button">Изменить</button>
        </form>
    </div>
@endsection
