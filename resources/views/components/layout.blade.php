<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <!-- bootstap -->
    <link rel="stylesheet" href="{{ asset('bootsrap/css/bootstrap.css') }}">
    <script scr="{{ asset('bootsrap/js/bootstrap.js') }}"></script>
    <script scr="{{ asset('bootsrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- remix icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.7.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- animation on scroll -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <!-- jquery -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>

    @stack('css')
</head>

<body>
    {{ $slot }}

    <!-- animation on scroll -->
    @vite('resources/js/app.js')
    <!-- sweet alert -->
    @include('sweetalert::alert')

</body>

</html>