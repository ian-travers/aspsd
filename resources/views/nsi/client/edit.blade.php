@extends('layouts.nsi')

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h3>Редактирование заказчика</h3>
        </div>
        <div class="card-body">
            <form id="client-form" action="{{ route('nsi.clients.update', $client->id) }}" method="post">

                @method('put')
                @csrf
                @include('nsi.client._form')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('nsi.clients.index') }}" class="btn btn-outline-secondary">Отменить</a>
            </form>
        </div>
    </div>
@endsection

