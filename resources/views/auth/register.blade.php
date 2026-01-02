<x-layout>
    <x-slot:title>Register</x-slot:title>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endpush
    @if (session('error'))
    <div class="alert alert-danger error-alert">{{ session('error') }}</div>
    @endif
    <main>
        <div class="form">
            <h3 class="mb-4">Register</h3>
            <form action="/register" method="post">

                @csrf

                <div class="mb-3 form-floating has-validation">
                    <input type="text" name="name" id="name" placeholder="Enter your fullname" class="form-control @error('name') is-invalid
                    @enderror" value="{{ old('name') }}">
                    <label for="name" class="form-label">Fullname</label>

                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-floating has-validation">
                    <input type="text" class="form-control @error('email') is-invalid
                    @enderror" id="email" placeholder="email" value="{{ old('email') }}" name="email">
                    <label for="email" class="form-label" >Email</label>

                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating mb-3 has-validation">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control  @error('password') is-invalid
                    @enderror">
                    <label for="password" class="form-label">Password</label>

                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3 form-floating has-validation">
                    <input type="password" name="confirm" id="confirm" class="form-control @error('confirm') is-invalid
                    @enderror" placeholder="confirm">
                    <label for="confirm" class="form-label">Confirm password</label>

                    @error('confirm')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

            <p class="register">Have an account? <a href="{{ route('login') }}">Log In</a></p>
        </div>
    </main>

    <script>
        $('.error-alert').fadeIn(1000).delay(3000).fadeOut(1000);
    </script>
</x-layout>