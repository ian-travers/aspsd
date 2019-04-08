<table class="table table-bordered">
    <thead>
    <tr class="bg-light">
        <td width="14%" class="text-center">Действия</td>
        <td>Имя пользователя</td>
        <td>ФИО</td>
        <td>Должность</td>
        <td>Email</td>
    </tr>
    </thead>
    <tbody>

    @php /* @var App\User $user */ @endphp

    @foreach($users as $user)

        <tr>
            <td class="text-center">

                <a href="{{ route('adm.users.edit', $user->id) }}" class="btn btn-outline-secondary btn-sm fa fa-pen" title="Изменить"></a>

                <button
                        type="button"
                        class="btn btn-sm btn-outline-primary bootstrap-modal-form-open fa fa-key"
                        title="Сменить пароль"
                        data-toggle="modal"
                        data-target="#changePasswordModal"
                        data-user-id="{{ $user->id }}"
                        data-user-name="{{ $user->name }}"
                ></button>

                <form class="d-inline" action="{{ route('adm.users.destroy', $user) }}" method="post">

                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Подтверждаете удаление?')"
                            class="btn btn-outline-danger btn-sm fa fa-trash" title="Удалить"></button>
                </form>


            </td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->fio }}</td>
            <td>{{ $user->post }}</td>
            <td>{{ $user->email }}</td>

        </tr>
    @endforeach

    </tbody>
</table>



