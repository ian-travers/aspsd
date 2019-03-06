@extends('layouts.app')

@section('script')
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Новый документ</h4>
            К проекту: {{ $project->name }}
        </div>
        <div class="card-body">
            <form id="doc-form" action="{{ route('projector.projects.docs.store') }}" method="post">

                @csrf
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

