@php /* @var App\User $user */ @endphp

<div class="row">
    <div class="col">
        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg required">
            <label for="name">Имя пользователя</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autofocus>

            @if($errors->has('name'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}"
                   class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}">

            @if($errors->has('email'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg required">
            <label for="role" class="col-form-label">Role</label>
            <select id="role" class="form-control {{ $errors->has('role') ? ' is-invalid' : '' }}" name="role">
                @foreach ($roles as $value => $label)
                    <option value="{{ $value }}"{{ $value === old('role', $user->role) ? ' selected' : '' }}>{{ $label }}</option>
                @endforeach;
            </select>
            @if ($errors->has('role'))
                <span class="invalid-feedback"><strong>{{ $errors->first('role') }}</strong></span>
            @endif
        </div>

        @if(!$user->exists)
            <div class="form-group shadow p-3 mb-4 bg-light rounded-lg required">
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
    </div>

    <div class="col">
        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            <label for="post">Должность</label>
            <input type="text" id="post" name="post" value="{{ old('post', $user->post) }}"
                   class="form-control {{ $errors->has('post') ? 'is-invalid' : '' }}">

            @if($errors->has('post'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('post') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            <label for="surname">Фамилия</label>
            <input type="text" id="surname" name="surname" value="{{ old('surname', $user->surname) }}"
                   class="form-control {{ $errors->has('surname') ? 'is-invalid' : '' }}">

            @if($errors->has('surname'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('surname') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            <label for="firstName">Имя</label>
            <input type="text" id="firstName" name="firstName" value="{{ old('firstName', $user->first_name) }}"
                   class="form-control {{ $errors->has('firstName') ? 'is-invalid' : '' }}">

            @if($errors->has('firstName'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('firstName') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            <label for="patronymicName">Отчество</label>
            <input type="text" id="patronymicName" name="patronymicName"
                   value="{{ old('patronymicName', $user->patronymic_name) }}"
                   class="form-control {{ $errors->has('patronymicName') ? 'is-invalid' : '' }}">

            @if($errors->has('patronymicName'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('patronymicName') }}</strong>
                </div>
            @endif
        </div>
    </div>
</div>


