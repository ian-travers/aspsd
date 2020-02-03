@extends('layouts.app')

@section('script')
  <script>
  </script>
@endsection

@section('content')
  <div class="card border-primary">
    <div class="card-header d-inline-flex align-items-end justify-content-between">

      <div>
        <form action="{{ route('projects.index') }}">
          <div class="input-group">
            <input type="text" class="form-control" value="{{ request('term') }}" name="term"
                   placeholder="наименование..." autofocus>
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div><!-- /input-group -->
        </form>
      </div>

      <div class="d-inline-flex float-right mt-2">
        <span class="bg-primary px-4 mr-2"></span> &mdash; <span class="px-2">просрочен</span>
        <span class="bg-danger px-4 mr-2"></span> &mdash; <span class="px-2">последний день</span>
        <span class="bg-warning px-4 mr-2"></span> &mdash; <span class="px-2">осталось менее 2-х недель</span>
      </div>
    </div>
    <div class="card-body">

      @if(!$projects->count())

        <div class="alert alert-warning">
          <h3>Записи не найдены</h3>
        </div>
      @else
        <div class="row">
          @include('frontend.project.table')
        </div>
        <div class="mt-3">
          {{ $projects->appends(request()->except('page'))->links() }}
        </div>
      @endif

    </div>
  </div>
@endsection

