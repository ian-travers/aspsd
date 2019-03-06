<table class="table table-bordered">
    <thead>
    <tr>
        <td width="254" class="text-center">Действия</td>
        <td>Наименование</td>
        <td>Заказчик</td>
        <td>Срок исх. документации</td>
        <td>Срок выдачи проекта</td>
        <td>Срок госстройэкспертизы</td>
    </tr>
    </thead>
    <tbody>

    @php
        /* @var App\Project $project */

    @endphp

    @foreach($projects as $project)

        <tr>
            <td class="text-center">

                <a href="{{ route('projector.projects.show', $project->id) }}" class="btn btn-outline-info btn-sm">
                    Просмотр
                </a>

                <a href="{{ route('projector.projects.edit', $project->id) }}" class="btn btn-outline-secondary btn-sm">
                    Изменить
                </a>

                @if($project->isDeletable())
                <form class="d-inline" action="{{ route('projector.projects.destroy', $project->id) }}" method="post">

                    @method('delete')
                    @csrf
                    <button type="submit" onclick="return confirm('Подтверждаете удаление?')"
                            class="btn btn-outline-danger btn-sm">
                        Удалить
                    </button>
                </form>
                @else
                    <button type="button" class="btn btn-outline-danger btn-sm disabled">
                        Удалить
                    </button>
                @endif


            </td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->client->name }}</td>
            <td class="text-center {{ $project->initInfoCellCSS }}">
                {{ $project->initInfoDeadline }}

                @if(!$project->isInitInfoGot())
                    <form action="{{ route('projector.projects.confirm-init-info', $project) }}" method="post">
                        @method('put')
                        @csrf
                       <button type="submit" onclick="return confirm('Подтверждаете получение?')" class="btn btn-sm btn-success">Подтвердить получение</button>
                    </form>
                @else
                    <span class="pl-2 text-success font-weight-bold" title="{{$project->init_info_got_at}}">&#10004;</span>
                @endif
            </td>
            <td class="text-center {{ $project->issueCellCSS }}">
                {{ $project->issueDeadline }}

                @if(!$project->isIssued())
                    <form action="{{ route('projector.projects.confirm-issued', $project) }}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" onclick="return confirm('Подтверждаете выдачу проекта?')" class="btn btn-sm btn-success">Подтвердить выдачу</button>
                    </form>
                @else
                    <span class="pl-2 text-success font-weight-bold" title="{{$project->issued_at}}">&#10004;</span>
                @endif
            </td>
            <td class="text-center {{ $project->expertiseCellCSS }}">
                {{ $project->expertiseDeadline }}

                @if(!$project->isExpertisePassed())
                    <form action="{{ route('projector.projects.confirm-expertise-passed', $project) }}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" onclick="return confirm('Подтверждаете выдачу проекта?')" class="btn btn-sm btn-success">Подтвердить экспетизу</button>
                    </form>
                @else
                    <span class="pl-2 text-success font-weight-bold" title="{{$project->expertise_passed_at}}">&#10004;</span>
                @endif
            </td>

        </tr>
    @endforeach

    </tbody>
</table>



