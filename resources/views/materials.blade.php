@extends('layouts.app')

@section('title', 'Полезные материалы')

@section('content')
    <div class="materials-page">
        <div class="materials-center">
            <div class="materials-text">
                НАЛОГОВЫЙ ВЫЧЕТ И <br>БЕСПРОЦЕНТНАЯ<br> РАССРОЧКА
                <div class="materials-subtitle">
                    <br>на профессиональные курсы<br> программирования и<br>информационных технологий
                </div>
                <div class="materials-border-img"></div>
                <form action="{{ route('home') }}" method="GET">
                    <button type="submit" class="materials-button">ПОДРОБНЕЕ</button>
                </form>
            </div>
        </div>
    </div>
@endsection
