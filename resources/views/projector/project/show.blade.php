@extends('layouts.app')

@section('script')
    <script>
    </script>
@endsection

@section('content')

    @php /* @var \App\Project $project */ @endphp
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
        </div>
    </div>

    <div class="card border-primary mt-2">
        <div class="card-header">
            <span style="font-size: 1.5rem; line-height: 1.2">Исходные документы для проекта</span>
            <a href="{{ route('projector.projects.docs.add', $project) }}" class="btn btn-outline-primary float-right">
                Добавить документ к проекту
            </a>
        </div>

        <div class="card-body">

            @if(!$project->projectDocs()->count())

                <div class="alert alert-warning">
                    <h4>Документы не найдены</h4>
                </div>
            @else
                @include('doc.table')

            @endif

        </div>

    </div>
@endsection

