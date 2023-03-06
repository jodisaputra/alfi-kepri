@extends('layouts.auth-backend')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="{{ route('admin.login.show') }}" class="h1"><b>Alfi</b>Batam</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Silahkan masukkan alamat email yang sudah terdaftar</p>
            <form action="{{ route('password.email') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                        name="email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-12">
                        <x-button type="submit" style="primary btn-block">Request new password</x-button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
            <p class="mt-3 mb-1">
                <a href="{{ route('admin.login.show') }}">Login</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
@endsection
