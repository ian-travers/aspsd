<?php

namespace App\Http\Controllers;


use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->paginate(10);

        return view('frontend.user.index', compact('users'));
    }

    public function show(User $user)
    {
        return view('frontend.user.show', compact('user'));
    }
}
