@extends('layouts.login')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            АС Учет ПСД
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Для входа в систему введите <br> имя пользователя и пароль</p>

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="form-group has-feedback">
                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus placeholder="Имя">

                    @if ($errors->has('name'))

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Пароль">

                    @if ($errors->has('password'))

                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="row">
                    <div class="col float-left mt-1">
                        <input type="checkbox" name="remember"
                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            Запомнить меня
                        </label>
                    </div>
                    <div class="col float-right">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
