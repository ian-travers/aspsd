@extends('layouts.app')

@section('script')
  <script>
  </script>
@endsection

@section('content')
  <div class="card border-primary">
    <div class="card-header d-inline-flex align-items-end justify-content-between">

      <div class="d-inline-flex">
        <form action="{{ route('projects.index') }}">
          <div class="input-group align-items-end">
            <label for="term" class="mr-2">Поиск:</label>
            <input type="text" class="form-control" value="{{ request('term') }}" name="term"
                   placeholder="наименование..." autofocus>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div><!-- /input-group -->
        </form>
        <div class="ml-4">
          <form action="{{ route('projects.index') }}" class="d-inline-flex align-items-end">
            <label for="years" class="mr-2">Год:</label>
            <select id="selected-year" name="year" class="form-control" onchange="this.form.submit()">
              @foreach($years as $year)

                <option value="{{ $year }}" {{ $year == $selectedYear ? ' selected' : '' }}>
                  {{ $year }}
                </option>

              @endforeach
            </select>
          </form>
        </div>
      </div>

    </div>
    <div class="card-body">

      @if(!$projects->count())

        <div class="alert alert-warning">
          <h3>Записи не найдены</h3>
        </div>
      @else
        <div class="float-right mt-n3 mb-1">
          <span class="bg-primary px-4 mr-2"></span> &mdash; <span class="px-2">просрочен</span>
          <span class="bg-danger px-4 mr-2"></span> &mdash; <span class="px-2">последний день</span>
          <span class="bg-warning px-4 mr-2"></span> &mdash; <span class="px-2">осталось менее 2-х недель</span>
        </div>
        @include('frontend.project.table')
        <div class="mt-3">
          {{ $projects->appends(request()->except('page'))->links() }}
        </div>
      @endif

    </div>
  </div>
@endsection

