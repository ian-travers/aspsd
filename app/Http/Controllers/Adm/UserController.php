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

    public function editPassword(User $user)
    {
        return view('adm.user.editPassword', compact('user'));
    }

    public function updatePassword(PasswordRequest $request, User $user)
    {

        $password = $request->input('password');

        $user->password = bcrypt($password);
        $user->saveOrFail();

        return redirect()->route('adm.users.index')->with([
            'message' => 'Пароль пользователя изменен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function changePasswordModal(Request $request)
    {
        return "Change Password Model";
    }
}
