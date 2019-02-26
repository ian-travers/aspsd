@extends('layouts.adm')

@section('script')
@endsection

@section('content')
    <div class="card border-primary">
        <div class="card-header">
            <h4>Новый проект</h4>
        </div>
        <div class="card-body">
            <form id="project-form" action="{{ route('adm.projects.store') }}" method="post">

                @csrf
                @include('adm.project._form')
                <button type="submit" class="btn btn-outline-primary">Сохранить</button>
                <a href="{{ route('adm.projects.index') }}" class="btn btn-outline-secondary">Отменить</a>
            </form>
        </div>
    </div>
@endsection

