@extends('layouts.adm')

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h3>Редактирование пользователя</h3>
        </div>
        <div class="card-body">
            <form id="client-form" action="{{ route('adm.users.update', $user->id) }}" method="post">

                @method('put')
                @csrf
                @include('adm.user._form')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('adm.users.index') }}" class="btn btn-outline-secondary">Отменить</a>
                <div class="float-right">
                    <p class="text-muted">
                        <span class="required">*</span>
                        <em>Отмечены обязательные поля</em>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

