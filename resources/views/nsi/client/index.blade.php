@extends('layouts.nsi')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('nsi.clients.create') }}" class="btn btn-sm btn-outline-primary">
                Добавить заказчика
            </a>
        </div>
        <div class="card-body">

            @if(!$clients->count())

                <div class="alert alert-warning">
                    <h3>Записи не найдены</h3>
                </div>
            @else
                @include('nsi.client.table')

                <div class="mt-3">
                    {{ $clients->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection

