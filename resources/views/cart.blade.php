@extends('layouts.app')

@section('title', 'Корзина')

@section('content')
    <div class="form-container">
        <h1>Корзина</h1>
        <h1>Оформление заказа</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('cart.pay') }}" method="POST" enctype="multipart/form-data" class="cart-form">
            @csrf
            <div class="form-group">
                <label for="number_card">Номер карты</label>
                <input type="text" name="number_card" placeholder="Введите номер карты (0000 0000 0000 0000)" maxlength="19" required>
            </div>
            <div class="form-group">
                <label for="owner">Владелец (как на карте)</label>
                <input type="text" name="owner" placeholder="Введите владельца карты (IVAN IVANOV)" required>
            </div>
            <div class="form-group">
                <label for="data_activity">Срок действия</label>
                <input type="date" name="data_activity" required>
            </div>
            <div class="form-group">
                <label for="cvc_code">CVC/CVV код</label>
                <input type="text" name="cvc_code" placeholder="Введите CVC код (000)" maxlength="3" required>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-button-client">Оплатить</button>
            </div>
        </form>
        <div class="profile-section" id="profile">
            <h2>Выбранные курсы</h2>
            <h3>{{'Общая цена: ' .  $final_price . ' Р'}}</h3>
            <form action="{{ route('cart.deletes') }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите очистить корзину?');">
                @csrf
                <button type="submit" class="btn-action btn-delete">Очистить</button>
            </form>
            <div class="profile-content">
                <ul>
                    @foreach($courses as $index => $course)
                        <li class="course-card">
                            <div class="course-logo">
                                <img src="{{ asset('storage/images/dynamic/logo_courses/' . $course->image_logo) }}" alt="{{ $course->title }}" />
                            </div>
                            <div class="course-info">
                                <span class="course-number">{{ $index + 1 }}.</span>
                                <span class="course-title">{{ 'Курс: ' . $course->title }}</span>
                                <span class="course-title">{{ 'Слоган: ' . $course->slogan }}</span>
                                <span class="course-title">{{ 'Сложность: ' . $course->complexity }}</span>
                                <span class="course-title">{{ 'Цена: ' . $course->price . ' Р'}}</span>
                            </div>
                            <form action="{{ route('cart.destroy', $course->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Вы уверены, что хотите удалить этот объект?');">
                                @csrf
                                <button type="submit" class="btn-action btn-delete">Удалить</button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="paginate-down-page">
                {{ $courses->links() }}
            </div>
        </div>
    </div>
@endsection
