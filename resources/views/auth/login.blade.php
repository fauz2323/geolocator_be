@extends('layouts.auth')
@section('content')
    <div class="col-md-6">
        <div class="authincation-content">
            <div class="row no-gutters">
                <div class="col-xl-12">
                    <div class="auth-form">
                        <div class="text-center mb-3">
                            <a href="index.html"><img src="{{ asset('logo.png') }}" height="100" width="100"
                                    alt=""></a>
                        </div>
                        <h4 class="text-center mb-4 text-white">Mohon Login Terlebih Dahulu</h4>
                        <form method="POST" action="{{ route('login') }}">
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
                                <label class="mb-1 text-white"><strong>Password</strong></label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="form-group">
                                    <a class="text-white" href="{{ route('password.request') }}">Forgot
                                        Password?</a>
                                </div>
                            </div>
                            <div class="text-center">


                                <button type="submit" class="btn bg-white text-primary btn-block">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                        <div class="new-account mt-3">
                            <p class="text-white">Tidak Punya Akses Akun? <a class="text-white"
                                    href="{{ route('register') }}">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
