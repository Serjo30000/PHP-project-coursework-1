<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
<div class="page-container">
    @include('partials.header-admin')

    <div class="container-admin">
        @yield('content')
    </div>

    @include('partials.footer-admin')
</div>
</body>
</html>
