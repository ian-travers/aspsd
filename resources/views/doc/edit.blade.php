@extends('layouts.app')

@section('script')
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Редактирование проекта</h4>
        </div>
        <div class="card-body">
            <form id="project-form" action="{{ route('projector.projects.update', $project) }}" method="post">

                @csrf
                @method('put')
                @include('projector.project._form')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('projector.projects.index') }}" class="btn btn-outline-secondary">Отменить</a>
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

