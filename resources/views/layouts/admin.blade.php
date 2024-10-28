<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body>
<header>
    <h1>Admin Panel</h1>
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
</footer>
</body>
</html>
