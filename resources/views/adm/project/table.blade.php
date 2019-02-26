<table class="table table-bordered">
    <thead>
    <tr>
        <td width="174" class="text-center" rowspan="2">Действия</td>
        <td rowspan="2">Наименование</td>
        <td rowspan="2">Заказчик</td>
        <td colspan="2">Срок исх. документации</td>
        <td colspan="2">Срок выдачи</td>
        <td colspan="2">Срок госстройэкспертизы</td>
    </tr>
    <tr>
        <td class="text-center">План</td>
        <td class="text-center">Факт</td>
        <td class="text-center">План</td>
        <td class="text-center">Факт</td>
        <td class="text-center">План</td>
        <td class="text-center">Факт</td>
    </tr>
    </thead>
    <tbody>

    @php
        /* @var App\Project $project */

    @endphp

    @foreach($projects as $project)

        <tr>
            <td class="text-center">

                <a href="{{ route('adm.projects.edit', $project->id) }}" class="btn btn-outline-secondary btn-sm">
                    Изменить
                </a>

                <form class="d-inline" action="{{ route('adm.projects.destroy', $project) }}" method="post">

                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Подтверждаете удаление?')"
                            class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>


            </td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->client->name }}</td>
            <td class="text-center">{{ $project->initInfoDeadline }}</td>
            <td class="text-center">{{ $project->initInfoGot }}</td>
            <td class="text-center">{{ $project->issueDeadline }}</td>
            <td class="text-center">{{ $project->issued }}</td>
            <td class="text-center">{{ $project->expertiseDeadline }}</td>
            <td class="text-center bg-info">{{ $project->expertisePassed }}</td>

        </tr>
    @endforeach

    </tbody>
</table>



