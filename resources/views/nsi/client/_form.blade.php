<div class="form-group">
    <label for="name">Наименование</label>
    <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" autofocus>

    @if($errors->has('name'))

    <div class="invalid-feedback">
        <strong>{{ $errors->first('name') }}</strong>
    </div>
    @endif
</div>

<div class="form-group">
    <input type="hidden" name="slug" value="{{ old('slug') }}" class="form-control" readonly>

    @if($errors->has('slug'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('slug') }}</strong>
        </div>
    @endif

</div>


