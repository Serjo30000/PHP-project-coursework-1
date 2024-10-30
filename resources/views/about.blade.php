@extends('layouts.app')

@section('title', 'О нас')

@section('content')
    <div class="about-page">
        <div class="about-content">
            <div class="about-left">
                <div class="header-logo2">
                    <img src="{{ asset('/storage/images/static/logo1.png') }}" alt="логотип" class="logo">
                </div>
                <div class="border-text">
                    <h2>ОБУЧАЕМ ДИЗАЙНЕРОВ И ПРОГРАММИСТОВ ДЛЯ РАБОТЫ В ИНДУСТРИИ</h2>
                </div>
                <div class="border-text">
                    <h2>ОНЛАЙН-ШКОЛА ДИЗАЙНА И ПРОГРАММИРОВАНИЯ</h2>
                </div>
            </div>

            <div class="about-right">
                <div class="text-center">
                    <p>С 2016 года мы готовим программистов и дизайнеров к работе в индустрии игр, web-сайтов и их дизайна.
                        Мы учим создавать уникальные сайты, дизайны игр, лепить 3D модели.
                        Раскладываем по полочкам Photoshop, Figma и другие программы для художников, которые выглядят сложными и непонятными.</p>
                    <p>С нами ты поймешь, как переносить образы из головы для дизайна игры или сайта. У тебя получится, даже если ты впервые возьмешься за программирование или составление макетов.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
