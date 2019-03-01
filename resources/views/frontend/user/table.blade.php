<table class="table table-bordered">
    <thead>
    <tr>
        <td width="98" class="text-center">Действия</td>
        <td>Имя пользователя</td>
        <td>ФИО</td>
        <td>Должность</td>
        <td>Email</td>
    </tr>
    </thead>
    <tbody>

    @php
        /* @var App\User $user */

    @endphp

    @foreach($users as $user)
        <tr>
            <td class="text-center">
                <a href="{{ route('users.show', $user) }}" class="btn btn-outline-secondary btn-sm">
                    Просмотр
                </a>
            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->fio }}</td>
            <td>{{ $user->post }}</td>
            <td>

                @if($user->email)
                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                @endif
            </td>
        </tr>
    @endforeach

    </tbody>
</table>



