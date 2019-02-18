@php /* @var App\User $user */ @endphp

<div class="form-group">
    <label for="name">Имя пользователя</label>
    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autofocus>

    @if($errors->has('name'))

        <div class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </div>
    @endif
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"
           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

    @if($errors->has('email'))

        <div class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif
</div>

@if(!$user->exists)
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="text" id="password" name="password" value="{{ old('password', $user->password) }}"
               class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">

        @if($errors->has('password'))

            <div class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
    </div>
@endif
