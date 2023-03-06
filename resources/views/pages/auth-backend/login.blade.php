@extends('layouts/auth-backend')
@section('title', 'Admin Login')

@section('content')

    <div class="login-logo">
        <a href=""><b>Alfi</b>Kepri</a>
    </div>

    <x-card>
        <div class="card-body login-card-body">
            <h4 class="login-box-msg">Login</h4>

            <form action="{{ route('admin.login.post') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember-me">
                            <label for="remember-me">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <x-button type="submit" style="primary btn-block">Sign In</x-button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            {{-- <p class="mb-1">
                <a href="{{ route('password.request') }}">I forgot my password</a>
            </p> --}}
        </div>
        <!-- /.login-card-body -->
    </x-card>
@endsection
