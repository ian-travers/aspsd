@extends('layouts.app')

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            Пользователи системы
        </div>
        <div class="card-body">

            @if(!$users->count())

                <div class="alert alert-warning">
                    <h3>Записи не найдены</h3>
                </div>
            @else

                @include('frontend.user.table')
                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection

