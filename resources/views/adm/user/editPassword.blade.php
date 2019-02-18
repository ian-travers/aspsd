@extends('layouts.adm')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Изменение пароля пользователя: <strong>{{ $user->name }}</strong></h3>
        </div>
        <div class="card-body">
            <form id="client-form" action="{{ route('adm.users.update-password', $user->id) }}" method="post">

                @method('patch')
                @csrf
                @include('adm.user._formPassword')
                <button type="submit" class="btn btn-outline-primary">Сохранить пароль</button>
                <a href="{{ route('adm.users.index') }}" class="btn btn-outline-secondary">Отменить</a>
            </form>
        </div>
    </div>
@endsection

