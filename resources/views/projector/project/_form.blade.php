@php /* @var App\Project $project */ @endphp

<div class="row">
    <div class="col">
        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg required">
            <label for="name">Наименование проекта</label>
            <input type="text" id="name" name="name" value="{{ old('name', $project->name) }}"
                   class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autofocus>

            @if($errors->has('name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>

            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg required">
            <label for="client">Заказчик</label>
            <select id="client" name="client_id" class="form-control {{ $errors->has('client') ? 'is-invalid' : '' }}">
                @include('adm.project._clientsList')
            </select>

            @if($errors->has('client'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('client') }}</strong>
                </div>

            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
            {{--{!! Form::label('Срок предоставления исходной документации') !!}--}}
            {{--{!! Form::date('init_info_deadline_at', $project->init_info_deadline_at, ['class' => [' form-control', $errors->has('init_info_deadline_at') ? 'is-invalid' : '']]) !!}--}}
            <label for="init_info_deadline_at">Срок предоставления исходной документации</label>
            <input type="date" id="init_info_deadline_at" name="init_info_deadline_at" value="{{ old('init_info_deadline_at', $project->init_info_deadline_at->format('Y-m-d')) }}"
                   class="form-control {{ $errors->has('init_info_deadline_at') ? 'is-invalid' : '' }}">

            @if($errors->has('init_info_deadline_at'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('init_info_deadline_at') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
            {!! Form::label('Срок выдачи проекта') !!}
            {!! Form::date('issue_deadline_at', $project->issue_deadline_at, ['class' => [' form-control', $errors->has('issue_deadline_at') ? 'is-invalid' : '']]) !!}

            @if($errors->has('issue_deadline_at'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('issue_deadline_at') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
            {!! Form::label('Срок прохождения госстройэкспертизы') !!}
            {!! Form::date('expertise_deadline_at', $project->expertise_deadline_at, ['class' => [' form-control', $errors->has('expertise_deadline_at') ? 'is-invalid' : '']]) !!}

            @if($errors->has('expertise_deadline_at'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('expertise_deadline_at') }}</strong>
                </div>
            @endif
        </div>
    </div>

    <div class="col">
        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
            <label for="post">Описание проекта</label>
            <textarea id="post" name="description" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}">{{ $project->description }}</textarea>

            @if($errors->has('description'))

                <div class="invalid-feedback">
                    <strong>{{ $errors->first('description') }}</strong>
                </div>
            @endif
        </div>

        <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
            <label for="author_supervisor_name">ФИО авторского надзора</label>
            <input type="text" id="author_supervisor_name" name="author_supervisor_name" value="{{ old('author_supervisor_name', $project->author_supervisor_name) }}"
                   class="form-control {{ $errors->has('author_supervisor_name') ? 'is-invalid' : '' }}">

            @if($errors->has('author_supervisor_name'))
                <div class="invalid-feedback">
                    <strong>{{ $errors->first('author_supervisor_name') }}</strong>
                </div>

            @endif
        </div>
    </div>
</div>


