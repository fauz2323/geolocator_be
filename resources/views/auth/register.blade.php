@extends('layouts.auth')


@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <h4 class="text-center mb-4 text-white">Sign up your account</h4>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label class="mb-1 text-white"><strong>email</strong></label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-1 text-white"><strong>Nama</strong></label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label class="mb-1 text-white"><strong>Password</strong></label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-1 text-white"><strong>Konfirmasi Password</strong></label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>


                            <div class="text-center mt-4">
                                <button type="submit" class="btn bg-white text-primary btn-block">Daftar</button>
                            </div>

                        </form>
                        <div class="new-account mt-3">
                            <p class="text-white">Sudah Punya Akun? <a class="text-white"
                                    href="{{ route('login') }}">Login</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
