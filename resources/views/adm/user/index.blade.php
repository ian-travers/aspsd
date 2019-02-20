@extends('layouts.adm')

@section('script')
    <script>
        $('#changePasswordModal').on('show.bs.modal', function (e) {
            let invoker = $(e.relatedTarget);
            let userId = invoker.data('user-id');
            let userName = invoker.data('user-name');

            $('#user-id').val(userId);
            $('#username').text(userName);
        })
    </script>
@endsection

@section('content')
    {{-- Modal --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog"
         aria-labelledby="changePasswordModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="changePasswordModalTitle">Смена пароля</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('adm.users.change-password-modal') }}" method="post"
                      class="bootstrap-modal-form">

                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <input type="hidden" name="userId" id="user-id">
                        <p class="text-center">Пользователь</p>
                        <p class="display-4 text-center" id="username">NAME</p>

                        @include('adm.user._formPassword')
                    </div>
                    <div class="modal-footer">
                        <div class="col px-0">
                            <button type="submit" class="btn btn-primary">Сменить пароль</button>
                        </div>
                        <div class="col px-0">
                            <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">Отменить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{--End Modal--}}

    <div class="card">
        <div class="card-header">
            <a href="{{ route('adm.users.create') }}" class="btn btn-outline-primary">
                Добавить пользователя
            </a>
        </div>
        <div class="card-body">

            @if(!$users->count())

                <div class="alert alert-warning">
                    <h3>Записи не найдены</h3>
                </div>
            @else
                @include('adm.user.table')

                <div class="mt-3">
                    {{ $users->links() }}
                </div>
            @endif

        </div>
    </div>
@endsection

