@extends('layouts.nsi')

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Новый заказчик</h4>
        </div>
        <div class="card-body">
            <form id="client-form" action="{{ route('nsi.clients.store') }}" method="post">

                @csrf
                @include('nsi.client._form')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('nsi.clients.index') }}" class="btn btn-outline-secondary">Отменить</a>
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

