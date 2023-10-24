@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/styleCustom.css') }}">
@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-40 p-b-40">
            <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                <div class="login100-form-title p-b-49r">{{ __('Register') }}</div>
                @csrf

                <div class="row">
                    <div class="wrap-input100 validate-input m-b-23 col-md-6 wrap-input100-bd" style="padding-left: 0px;">
                        <label for="name" class="label-input100">{{ __('Name') }}</label>

                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror input100" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23 col-md-6 wrap-input100-bd" style="padding-right: 0px;">
                        <label for="phone" class="label-input100">{{ __('Phone Number') }}</label>

                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror input100" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-23 wrap-input100-bd">
                        <label for="email" class="label-input100">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror input100" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 m-b-23 validate-input wrap-input100-bd">
                        <label for="password" class="label-input100">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror input100" name="password" required autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 m-b-23 validate-input wrap-input100-bd">
                        <label for="password-confirm" class="label-input100">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
