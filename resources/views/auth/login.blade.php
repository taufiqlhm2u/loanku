<x-layout>
    <x-slot:title>Login</x-slot:title>
    @push('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endpush
    <div class="form">
        <form action="">
        <div class="mb-3 form-floating">
            <input type="text" class="form-control" id="email" placeholder="Enter your email">
            <label for="email" class="form-label">Email</label>
        </div>
    </form>
    </div>
</x-layout>