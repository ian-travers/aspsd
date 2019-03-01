@extends('layouts.app')


@section('content')

    @php /* @var App\Project $project */ @endphp

    <div class="card border-primary">
        <div class="card-header">
            <h2 class="text-primary">{{ $project->name }}</h2>
        </div>
        <div class="card-body">
            <div>
                <p><span class="text-muted">Заказчик:</span> {{ $project->client->name }}</p>
            </div>
            @if($project->description)
                <div class="text-muted mb-1">Краткое описание проекта</div>
                <div class="lead">{{ $project->description }}</div>
                <hr>
            @endif
            <div class="row">
                <div class="col">
                    <div class="text-muted mb-2">Сроки исполнения проекта</div>
                    <div class="row">
                        <div class="col">
                            Исходная документация:
                        </div>
                        <div class="col text-center">{{ $project->initInfoDeadline }}</div>
                        <div class="col text-center">{{ $project->initInfoGot }}</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Выдача проекта:
                        </div>
                        <div class="col text-center">{{ $project->issueDeadline }}</div>
                        <div class="col text-center">{{ $project->issued }}</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Госстройэкспертиза:
                        </div>
                        <div class="col text-center">{{ $project->issueDeadline }}</div>
                        <div class="col text-center">{{ $project->issued }}</div>
                    </div>
                </div>
                <div class="col">
                    <div class="text-muted mb-2">Контрольные даты проекта</div>
                    <div class="row">
                        <div class="col">
                            Дата создания:
                        </div>
                        <div class="col text-center">
                            {{ $project->created_at ? $project->created_at->format('d.m.Y H:i') : '' }}
                        </div>
                        <div class="col text-center">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            Последнее изменение:
                        </div>
                        <div class="col text-center">
                            {{ $project->updated_at ? $project->updated_at->format('d.m.Y H:i') : '' }}
                        </div>
                        <div class="col text-center">

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

