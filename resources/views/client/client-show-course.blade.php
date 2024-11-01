@extends('layouts.app')

@section('content')
    <div class="client-course-show">
        <div class="client-course-show-info-card">
            <div class="client-course-show-content-container">
                <!-- Левая колонка с информацией -->
                <div class="client-course-show-info-section">
                    <div class="client-course-show-info-section-text">{{ $course->slogan }}</div>
                    <div class="client-course-show-info-section-h-text">{{ $course->title }}</div>
                    <div class="client-course-show-info-section-text">{{ $course->description }}</div>
                    <div class="client-course-show-buttons">
                        <form action="{{ route('client.client-course-types.index') }}" method="GET">
                            <input type="hidden" name="type_id" value="{{ $course->course_type_id }}">
                            <button type="submit" class="client-course-show-action-button client-course-show-secondary-action">
                                Вернуться
                            </button>
                        </form>
                        <form action="{{ route('cart.add', ['course_id' => $course->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="client-course-show-action-button client-course-show-primary-action">
                                В корзину
                            </button>
                        </form>
                    </div>
                </div>
                <div class="client-course-show-banner-section">
                    <img src="{{ asset('storage/images/dynamic/banner_courses/' . $course->image_banner_course) }}" alt="Фото">
                </div>
            </div>
            <h1 class="client-course-show-title"> Всё о курсе</h1>
            <div class="client-course-info-container">
                <div class="client-course-info-item">
                    <div class="client-course-info-label">
                        Сложность
                    </div>
                    <div class="client-course-info-value">
                        {{ $course->complexity }}
                    </div>
                </div>
                <div class="client-course-info-item">
                    <div class="client-course-info-label">
                        Длительность
                    </div>
                    <div class="client-course-info-value">
                        {{ $course->count_week . ' НЕДЕЛЬ' }}
                    </div>
                </div>
                <div class="client-course-info-item">
                    <div class="client-course-info-label">
                        Лекции
                    </div>
                    <div class="client-course-info-value">
                        {{ $course->lecture_status }}
                    </div>
                </div>
            </div>
            <div class="client-course-info-container">
                <div class="client-course-info-item">
                    <div class="client-course-info-label">
                        Количество лекций
                    </div>
                    <div class="client-course-info-value">
                        {{ $course->count_lectures }}
                    </div>
                </div>
                <div class="client-course-info-item">
                    <div class="client-course-info-label">
                        Количество практик
                    </div>
                    <div class="client-course-info-value">
                        {{ $course->count_seminars }}
                    </div>
                </div>
                <div class="client-course-info-item">
                    <div class="client-course-info-label">
                        Количество онлайн занятий
                    </div>
                    <div class="client-course-info-value">
                        {{ $course->count_online_classes }}
                    </div>
                </div>
            </div>
            <div class="client-course-price-container">
                <div class="client-course-price-item">
                    <div class="client-course-price-label">
                        Цена
                    </div>
                    <div class="client-course-price-value">
                        {{ $course->price . ' Р' }}
                    </div>
                </div>
            </div>
            <div class="client-course-focuses-container">
                <h2 class="client-course-focuses-title">Для кого курс</h2>
                <ul class="client-course-focuses-list">
                    @if($course->focuses->isEmpty())
                        <li class="client-course-focuses-item">Нет доступных фокусов для этого курса.</li>
                    @else
                        @foreach($course->focuses as $focus)
                        <li class="client-course-focuses-item">{{ $focus->for_whom }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <div class="client-course-teachers-container">
                <h2 class="client-course-teachers-title">Наши учителя</h2>
                <div class="client-course-teachers-list">
                    @if($teachers->isEmpty())
                        <div class="client-course-teachers-item">Нет доступных учителей для этого курса.</div>
                    @else
                        @foreach($teachers as $teacher)
                            <div class="client-course-teachers-item">
                                <div class="client-course-teacher-photo">
                                    <img src="{{ asset('storage/images/dynamic/photos/' . $teacher->image_photo) }}" alt="Фото учителя">
                                </div>
                                <div class="client-course-teacher-info">
                                    <h3 class="client-course-teacher-name">
                                        {{ $teacher->second_name }}
                                        {{ $teacher->first_name }}
                                        @if($teacher->last_name)
                                            {{ $teacher->last_name }}
                                        @endif
                                    </h3>
                                    <p class="client-course-teacher-description">{{ $teacher->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <h1 class="client-course-show-title">Автор курса
                {{ $course->user->second_name }}
                {{ $course->user->first_name }}
                @if($course->user->last_name)
                    {{ $course->user->last_name }}
                @endif</h1>
            <div class="client-course-price-container">
                <div class="client-course-price-item">
                    <img src="{{ asset('storage/images/dynamic/avatars/' . $course->user->image_avatar) }}" alt="Аватар" class="client-course-price-image">
                </div>
                <div class="client-course-price-item">
                    <div class="client-course-price-value">
                        {{ $course->user->description }}
                    </div>
                </div>
            </div>
            <h1 class="client-course-show-title">Твой выпускной сертификат</h1>
            <div class="client-course-price-container">
                <div class="client-course-price-item">
                    <img src="{{ asset('storage/images/dynamic/certificates/' . $course->image_certificate) }}" alt="Сертификат" class="client-course-price-image">
                </div>
                <div class="client-course-price-item">
                    <div class="client-course-price-value">
                        Именной сертификат станет отличным дополнением к твоему портфолио. Он покажет будущему работодателю, что ты владеешь не только практическими навыками, но и обладаешь структурированными знаниями. Те и другие в равной степени нужны для работы над реальными проектами.
                    </div>
                </div>
            </div>
            <div class="comment-form-section">
                <h2 class="comment-form-title">Оставить комментарий</h2>
                <form action="{{ route('client.client-show-course.commenting') }}" method="POST" class="comment-form-element">
                    @csrf
                    <input type="hidden" name="course_id" value="{{ $course->id }}">

                    <div class="comment-form-group">
                        <label for="grade" class="comment-form-label">Оценка:</label>
                        <select name="grade" id="grade" required class="comment-form-select">
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" {{ $i == 5 ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    <div class="comment-form-group">
                        <label for="title" class="comment-form-label">Заголовок:</label>
                        <input type="text" name="title" id="title" required placeholder="Введите заголовок" class="comment-form-input">
                    </div>

                    <div class="comment-form-group">
                        <label for="text" class="comment-form-label">Комментарий:</label>
                        <textarea name="text" id="text" rows="4" class="comment-form-textarea"></textarea>
                    </div>

                    <button type="submit" class="comment-form-submit">Отправить</button>
                </form>
            </div>
            <div class="comments-section">
                <h2>Комментарии</h2>
                @foreach($reviews as $review)
                    <div class="comment">
                        <div class="comment-user">
                            <img class="user-avatar" src="{{ asset('storage/images/dynamic/avatars/' . $review->user->image_avatar) }}" alt="{{ $review->user->login }}">
                            <strong>{{ $review->user->login }}</strong>
                        </div>
                        <div class="comment-grade">Оценка: {{ $review->grade }}</div>
                        <h4>{{ $review->title }}</h4>
                        <p>{{ $review->text }}</p>
                        <small>Добавлено: {{ $review->created_at->format('d.m.Y H:i') }}</small>
                    </div>
                @endforeach
                <div class="paginate-down-page">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
