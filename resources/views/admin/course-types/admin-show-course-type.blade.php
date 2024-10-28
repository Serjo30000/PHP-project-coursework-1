@extends('layouts.admin')

@section('content')
    <h1>Просмотр типа курсов</h1>

    <div>
        <strong>Номер:</strong> {{ $course_type->id }}
    </div>
    <div>
        <strong>Название:</strong> {{ $course_type->name }}
    </div>

    <a href="{{ route('admin.course-types.index') }}" class="btn btn-secondary">Вернуться</a>
@endsection
