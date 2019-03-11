<table class="table table-bordered">
    <thead>
    <tr class="bg-light">
        <td width="178" class="text-center">Действия</td>
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

                @if($client->isDeletable())
                <form class="d-inline" action="{{ route('nsi.clients.destroy', $client) }}" method="post">

                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Подтверждаете удаление?')" class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>
                @else
                    <button type="button" class="btn btn-outline-danger btn-sm disabled">
                        Удалить
                    </button>
                @endif


            </td>
            <td>{{ $client->name }}</td>
        </tr>
    @endforeach

    </tbody>
</table>



