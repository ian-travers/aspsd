<table class="table table-bordered">
    <thead>
    <tr>
        <td width="178">Действия</td>
        <td>Имя пользователя</td>
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

                <a href="{{ route('adm.users.edit', $user->id) }}" class="btn btn-outline-secondary btn-sm">
                    Изменить
                </a>

                <form class="d-inline" action="{{ route('adm.users.destroy', $user) }}" method="post">

                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Подтверждаете удаление?')" class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>


            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
        </tr>
    @endforeach

    </tbody>
</table>



