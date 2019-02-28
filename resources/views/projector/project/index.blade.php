@extends('layouts.app')

@section('script')
    <script>
    </script>
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <a href="{{ route('projector.projects.create') }}" class="btn btn-outline-primary">
                Добавить проект
            </a>
            <div class="d-inline-flex float-right mt-2">
                <span class="mr-2 text-success font-weight-bold">&#10004;</span> &mdash; <span class="px-2">подтверждено получение</span>
                <span class="bg-primary px-4 mr-2"></span> &mdash; <span class="px-2">просрочен</span>
                <span class="bg-danger px-4 mr-2"></span> &mdash; <span class="px-2">последний день</span>
                <span class="bg-warning px-4 mr-2"></span> &mdash; <span class="px-2">осталось менее 2-х недель</span>
            </div>
        </div>
        <div class="card-body">

            @if(!$projects->count())

                <div class="alert alert-warning">
                    <h3>Записи не найдены</h3>
                </div>
            @else
                @include('projector.project.table')

                <div class="mt-3">
                    {{ $projects->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection

