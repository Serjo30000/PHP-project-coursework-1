@extends('layouts.author')

@section('content')
    <div class="form-container">
        <h1 class="form-title">Изменение для кого курс</h1>
        <a href="{{ route('author.focuses.allFocuses',$focus->course_id) }}" class="action-link secondary-action">Вернуться</a>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('author.focuses.update', $focus->id) }}" method="POST" enctype="multipart/form-data" class="teacher-form">
            @csrf
            @method('PUT')

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
            <button type="submit" class="submit-button">Изменить</button>
        </form>
    </div>
@endsection
