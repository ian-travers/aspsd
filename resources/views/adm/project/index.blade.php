@extends('layouts.adm')

@section('script')
    <script>
    </script>
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <a href="{{ route('adm.projects.create') }}" class="btn btn-outline-primary">
                Добавить проект
            </a>
        </div>
        <div class="card-body">

            @if(!$projects->count())

                <div class="alert alert-warning">
                    <h3>Записи не найдены</h3>
                </div>
            @else
                @include('adm.project.table')

                <div class="mt-3">
                    {{ $projects->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection

