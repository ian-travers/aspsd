<table class="table table-bordered">
    <thead>
    <tr>
        <td width="178">Действия</td>
        <td>Наименование</td>
    </tr>
    </thead>
    <tbody>

    @php
        /* @var App\Client $client */

    @endphp

    @foreach($clients as $client)

        <tr>
            <td class="text-center">

                <a href="{{ route('nsi.clients.edit', $client->id) }}" class="btn btn-outline-secondary btn-sm">
                    Изменить
                </a>

                <form class="d-inline" action="{{ route('nsi.clients.destroy', $client) }}" method="post">

                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Подтверждаете удаление?')" class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>


            </td>
            <td>{{ $client->name }}</td>
        </tr>
    @endforeach

    </tbody>
</table>



