<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script scr="{{ asset('js/bootstrap.js') }}"></script>
    <script scr="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    @stack('css')
</head>
<body>
    {{ $slot }}
</body>
</html>