<hr>
<h3>Служебные поля</h3>
<div class="row">
    <div class="col">
        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            {!! Form::label('Дата фактического представления исх. документации') !!}
            {!! Form::date('init_info_got_at', $project->init_info_got_at, ['class' => [' form-control', $errors->has('init_info_got_at') ? 'is-invalid' : '']]) !!}

            @if($errors->has('init_info_got_at'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('init_info_got_at') }}</strong>
            </div>
            @endif
        </div>
    </div>

    <div class="col">
        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            {!! Form::label('Дата фактической выдачи проекта') !!}
            {!! Form::date('issued_at', $project->issued_at, ['class' => [' form-control', $errors->has('issued_at') ? 'is-invalid' : '']]) !!}

            @if($errors->has('issued_at'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('issued_at') }}</strong>
            </div>
            @endif
        </div>
    </div>

    <div class="col">
        <div class="form-group shadow p-3 mb-4 bg-light rounded-lg">
            {!! Form::label('Дата фактического прохождения госстройэкспертизы') !!}
            {!! Form::date('expertise_passed_at', $project->expertise_passed_at, ['class' => [' form-control', $errors->has('expertise_passed_at') ? 'is-invalid' : '']]) !!}

            @if($errors->has('expertise_passed_at'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('expertise_passed_at') }}</strong>
            </div>
            @endif
        </div>
    </div>
</div>

