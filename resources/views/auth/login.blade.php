@extends('layouts.base_admin.base_auth') 
@section('title', 'Login') 
@section('content')
<div class="login-box">

    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ __('auth.login.message.signin_session') }}</p>
            <ul id="logTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item @error('email') active @enderror @if($errors->isEmpty()) active @endif"><a href="#login_via_email" aria-controls="Log In" role="tab" data-toggle="tab" class="nav-link"> Email </a></li>
                <li role="presentation" class="nav-item @error('phone') active  @enderror"><a href="#login_via_phone" aria-controls="Log In" role="tab" data-toggle="tab" class="nav-link"> Phone </a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in @error('email') active show @enderror @if($errors->isEmpty()) active show @endif" id="login_via_email">
                    
                        <form id="email_login" action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input
                                    id="email"
                                    type="email"
                                    placeholder="{{ __('auth.login.form.email') }}"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required="required"
                                    autocomplete="email"
                                    autofocus="autofocus">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="input-group mb-3">
                                <input
                                    id="password"
                                    type="password"
                                    placeholder="{{ __('auth.login.form.password') }}"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    required="required"
                                    autocomplete="current-password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember">
                                        <label for="remember">
                                            {{ __('auth.login.form.rememberme') }}
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>
                    
                </div>
                <div role="tabpanel" class="tab-pane fade in @error('phone') active show @enderror" id="login_via_phone"  >
                    <form id="phone_login" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <input
                                id="phone"
                                type="tel"
                                placeholder="{{ __('auth.login.form.phone') }}"
                                class="form-control @error('phone') is-invalid @enderror"
                                name="phone"
                                value="{{ old('phone') }}"
                                required="required"
                                autocomplete="phone"
                                autofocus="autofocus">
                            {{-- <input type="email" class="form-control" placeholder="Email" autocomplete="off"> --}}
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-phone"></span>
                                </div>
                            </div>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="input-group mb-3">
                            {{-- <input type="password" class="form-control" placeholder="Password"> --}}
                            <input
                                id="password"
                                type="password"
                                placeholder="{{ __('auth.login.form.password') }}"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                required="required"
                                autocomplete="current-password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        {{ __('auth.login.form.rememberme') }}
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('auth.login.button.login') }}</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                </div>
            </div>

            <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('auth.login.button.forgot_pass') }}</a>
            </p>
            <p class="mb-0">
                {{ __('auth.login.message.ask_register') }}
                <a href="{{ route('register') }}" class="text-center">{{ __('auth.login.button.register') }}</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection

<!-- /.login-box -->
