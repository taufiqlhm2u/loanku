<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <script scr="{{ asset('js/bootstrap.js') }}"></script>
    <script scr="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    

    @stack('css')
</head>

<body>
    {{ $slot }}
    @vite('resources/js/app.js')
    @include('sweetalert::alert')
</body>

</html>