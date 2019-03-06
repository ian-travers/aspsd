@extends('layouts.app')

@section('script')
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Редактирование документа</h4>
            К проекту: {{ $project->name }}
        </div>
        <div class="card-body">
            <form id="project-form" action="{{ route('projector.projects.docs.update', $doc) }}" method="post">

                @csrf
                @method('put')
                @include('doc._form')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('projector.projects.show', $project) }}" class="btn btn-outline-secondary">Отменить</a>
                <div class="float-right">
                    <p class="text-muted">
                        <span class="required">*</span>
                        <em>Отмечены обязательные поля</em>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection

