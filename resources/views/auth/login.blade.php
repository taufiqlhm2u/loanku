<x-layout>
    <x-slot:title>Login</x-slot:title>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    @endpush
    @if (session('error'))
    <div class="alert alert-danger error-alert">{{ session('error') }}</div>
    @endif
    <main>
        <div class="form">
            <h3 class="mb-4">Welcome Back</h3>
            <form action="/login" method="post">

                @csrf
                <div class="mb-3 form-floating has-validation">
                    <input type="text" class="form-control @error('email') is-invalid
                    @enderror" id="email" placeholder="email" name="email" value="{{ old('email') }}">
                    <label for="email" class="form-label">Enter your email</label>

                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-floating mb-3 has-validation">
                    <input type="password" name="password" id="password" placeholder="password" class="form-control  @error('password') is-invalid
                    @enderror">
                    <label for="password" class="form-label">Enter password</label>

                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <div class="form-check">
                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Remember me</label>
                    </div>

                    <div class="forgot">
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Log In</button>
                </div>
            </form>

            <p class="register">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
        </div>
    </main>

    <script>
        $('.error-alert').fadeIn(1000).delay(3000).fadeOut(1000);
    </script>
</x-layout>