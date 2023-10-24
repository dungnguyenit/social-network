@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/styleCustom.css') }}">

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-40">
            <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
                <div class="login100-form-title p-b-49">{{ __('Login') }}</div>
                @csrf
                <div class="wrap-input100 validate-input m-b-23">
                    <label for="email" class="label-input100">{{ __('E-Mail/Phone Number') }}</label>

                    <input id="username" class="form-control @error('username') is-invalid @enderror input100" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="wrap-input100 validate-input">
                    <label for="password" class="label-input100">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input100" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="for=" remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <button type="submit" class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
                <div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

