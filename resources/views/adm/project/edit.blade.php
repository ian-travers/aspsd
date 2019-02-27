@extends('layouts.adm')

@section('script')
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Редактирование проекта</h4>
        </div>
        <div class="card-body">
            <form id="project-form" action="{{ route('adm.projects.update', $project) }}" method="post">

                @csrf
                @method('put')
                @include('adm.project._form')
                @include('adm.project._classifiedFormFields')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('adm.projects.index') }}" class="btn btn-outline-secondary">Отменить</a>
            </form>
        </div>
    </div>
@endsection

