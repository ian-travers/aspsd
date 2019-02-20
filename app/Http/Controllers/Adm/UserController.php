<?php

namespace App\Http\Controllers\Adm;

use App\Http\Requests\User\PasswordRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);

        return view('adm.user.index', compact('users'));
    }

    public function create()
    {
        $user = new User();

        return view('adm.user.create', compact('user'));
    }

    public function store(UserStoreRequest $request)
    {
        User::create($request->all());

        return redirect()->route('adm.users.index')->with([
            'message' => 'Пользователь сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('adm.user.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());

        return redirect()->route('adm.users.index')->with([
            'message' => 'Пользователь сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('adm.users.index')->with([
            'message' => 'Пользователь удален успешно',
            'alert-type' => 'success',
        ]);
    }

    public function changePasswordModal(Request $request)
    {
        if ($request->isMethod('patch')) {

            try {
                $this->validate($request,
                    [
                        'userId' => 'required',
                        'password' => 'required|string|min:4',
                    ],
                    [
                        'password.required' => 'Пароль не должен быть пустым',
                        'password.min' => 'Пароль не менее 4-х символов',
                    ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                $key = key($e->errors());
                $message = $e->errors()[$key][0];

                return back()->with([
                    'message' => $message,
                    'alert-type' => 'error',
                ]);
            }


            return back()->with([
                'message' => 'Пароль пользователя изменен успешно',
                'alert-type' => 'success',
            ]);
        }

        return back()->with([
            'message' => 'Недопустимый метод',
            'alert-type' => 'warning',
        ]);
    }
}
