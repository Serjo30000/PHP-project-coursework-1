@extends('layouts.author')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Создание для кого курс</h1>
        <a href="{{ route('author.focuses.allFocuses',$course->id) }}" class="action-link secondary-action">Вернуться</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('author.focuses.store') }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            <div class="form-group">
                <label for="course_id">Курс*</label>
                <select name="course_id" required>
                    @foreach ($courses as $courseEl)
                        <option value="{{ $courseEl->id }}" {{ old('course_id') == $courseEl->id ? 'selected' : '' }}>
                            {{ $courseEl->id . ' ' . $courseEl->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="for_whom">Для кого*</label>
                <input type="text" name="for_whom" value="{{ old('for_whom', $focus->for_whom ?? '') }}" placeholder="Введите для кого (Начинающих дизайнеров)" required>
            </div>
            <button type="submit" class="submit-button">Создать</button>
        </form>
    </div>
@endsection
