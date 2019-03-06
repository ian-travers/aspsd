@php
    /* @var App\Project $project */
    /* @var App\ProjectDoc $doc */
@endphp

    <div class="form-group shadow p-3 mb-3 bg-light rounded-lg required">
        <label for="name">Наименование документа</label>
        <input type="text" id="name" name="name" value="{{ old('name', $doc->name) }}"
               class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autofocus>

        @if($errors->has('name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </div>

        @endif
    </div>

    <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
        <label for="signer_name">Организация</label>
        <input type="text" id="organization" name="organization"
               value="{{ old('organization', $doc->organization) }}"
               class="form-control {{ $errors->has('organization') ? 'is-invalid' : '' }}">

        @if($errors->has('organization'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('organization') }}</strong>
            </div>

        @endif
    </div>

    <div class="form-group shadow p-3 mb-3 bg-light rounded-lg required">
        {!! Form::label('Дата') !!}
        {!! Form::date('doc_date', $doc->doc_date, ['class' => [' form-control', $errors->has('doc_date') ? 'is-invalid' : '']]) !!}

        @if($errors->has('doc_date'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('doc_date') }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group shadow p-3 mb-3 bg-light rounded-lg">
        <label for="signer_name">ФИО</label>
        <input type="text" id="signer_name" name="signer_name"
               value="{{ old('signer_name', $doc->signer_name) }}"
               class="form-control {{ $errors->has('signer_name') ? 'is-invalid' : '' }}">

        @if($errors->has('signer_name'))
            <div class="invalid-feedback">
                <strong>{{ $errors->first('signer_name') }}</strong>
            </div>

        @endif
    </div>

    <div class="form-group d-none">
        <input type="hidden" id="project_id" name="project_id" value="{{ $project->id }}" class="form-control">
    </div>


