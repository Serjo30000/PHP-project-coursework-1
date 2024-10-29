@extends('layouts.author')

@section('content')
    <h1 class="page-title">Отзывы</h1>
    <a href="{{ route('author.courses.index') }}" class="action-link secondary-action">Вернуться</a>
    <table class="admin-table">
        <thead>
        <tr>
            <th>Номер</th>
            <th>Оценка</th>
            <th>Заголовок</th>
            <th>Номер курса</th>
            <th>Номер пользователя</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->grade }}</td>
                <td>{{ $review->title }}</td>
                <td>{{ $review->course_id }}</td>
                <td>{{ $review->user_id }}</td>
                <td>
                    <form action="{{ route('author.reviews.show', $review->id) }}" method="GET" style="display: inline;">
                        <button type="submit" class="btn-action">Посмотреть</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="paginate-down-page">
        {{ $reviews->links() }}
    </div>
@endsection
