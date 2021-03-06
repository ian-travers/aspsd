@extends('layouts.adm')

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Новый пользователь</h4>
        </div>
        <div class="card-body">
            <form id="user-form" action="{{ route('adm.users.store') }}" method="post">

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

