<table class="table table-bordered">
    <thead>
    <tr class="bg-light">
        <td width="8%" class="text-center" rowspan="2">Действия</td>
        <td rowspan="2">@sortablelink('name', 'Наименование')</td>
        <td width="10%" rowspan="2">@sortablelink('client_id', 'Заказчик')</td>
        <td colspan="2">@sortablelink('init_info_deadline_at', 'Срок исх. документации')</td>
        <td colspan="2">@sortablelink('issue_deadline_at', 'Срок выдачи проекта')</td>
        <td colspan="2">Срок госстройэкспертизы</td>
    </tr>
    <tr class="bg-light">
        <td class="text-center" width="8%">План</td>
        <td class="text-center" width="8%">Факт</td>
        <td class="text-center" width="8%">План</td>
        <td class="text-center" width="8%">Факт</td>
        <td class="text-center" width="8%">План</td>
        <td class="text-center" width="8%">Факт</td>
    </tr>
    </thead>
    <tbody>

    @php /* @var App\Project $project */ @endphp

    @foreach($projects as $project)

        <tr>
            <td class="text-center">

                @can('project-detail')
                    <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-info btn-sm fa fa-eye" title="Посмотреть"></a>

                @else
                    <a href="#" class="fa fa-eye btn btn-outline-info btn-sm"></a>
                @endcan
            </td>
            <td>{{ $project->name }}</td>
            <td>{{ $project->client->name }}</td>
            <td class="text-center {{ $project->initInfoCellCSS }}">{{ $project->initInfoDeadline }}</td>
            <td class="text-center">{{ $project->initInfoGot }}</td>
            <td class="text-center {{ $project->issueCellCSS }}">{{ $project->issueDeadline }}</td>
            <td class="text-center">{{ $project->issued }}</td>
            <td class="text-center {{ $project->expertiseCellCSS }}">{{ $project->expertiseDeadline }}</td>
            <td class="text-center">{{ $project->expertisePassed }}</td>

        </tr>
    @endforeach

    </tbody>
</table>



