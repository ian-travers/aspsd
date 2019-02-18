@extends('layouts.adm')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('adm.users.create') }}" class="btn btn-outline-primary">
                Добавить пользователя
            </a>
        </div>
        <div class="card-body">

            @if(!$users->count())

                <div class="alert alert-warning">
                    <h3>Записи не найдены</h3>
                </div>
            @else
                @include('adm.user.table')

                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection

