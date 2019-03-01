@extends('layouts.app')

@section('content')

    @php /* @var App\User $user */ @endphp
    <div class="card border-primary">
        <div class="card-header">
            <h2 class="text-primary">{{ $user->name }}</h2>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <td><em>Фамилия</em></td>
                    <td width="85%">{{ $user->surname }}</td>
                </tr>
                <tr>
                    <td><em>Имя</em></td>
                    <td>{{ $user->first_name }}</td>
                </tr>
                <tr>
                    <td><em>Отчество</em></td>
                    <td>{{ $user->patronymic_name }}</td>
                </tr>
                <tr>
                    <td><em>Должность</em></td>
                    <td>{{ $user->post }}</td>
                </tr>
                <tr>
                    <td><em>Дата регистрации</em></td>
                    <td>{{ $user->created_at ? $user->created_at->format('d.m.Y H:s') : '' }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

