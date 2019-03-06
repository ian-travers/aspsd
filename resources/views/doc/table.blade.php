<table class="table table-bordered">
    <thead>
    <tr>

        @can('projector-panel')
            <td width="174" class="text-center">Действия</td>

        @endcan
        <td>Наименование</td>
        <td>Организация</td>
        <td>Дата документа</td>
        <td>ФИО</td>
    </tr>
    </thead>
    <tbody>

    @php /* @var App\ProjectDoc $doc */ @endphp

    @foreach($project->projectDocs as $doc)

        <tr>
            @can('projector-panel')
                <td class="text-center">

                    <a href="{{ route('projector.projects.docs.edit', [$project, $doc]) }}"
                       class="btn btn-outline-secondary btn-sm">
                        Изменить
                    </a>

                    <form class="d-inline" action="{{ route('projector.projects.docs.destroy', [$project, $doc]) }}"
                          method="post">

                        @method('delete')
                        @csrf
                        <button type="submit" onclick="return confirm('Подтверждаете удаление?')"
                                class="btn btn-outline-danger btn-sm">
                            Удалить
                        </button>
                    </form>

                </td>
            @endcan
            <td>{{ $doc->name }}</td>
            <td>{{ $doc->organization }}</td>
            <td>{{ $doc->doc_date ? $doc->date : ''}}</td>
            <td>{{ $doc->signer_name }}</td>
        </tr>
    @endforeach

    </tbody>
</table>



