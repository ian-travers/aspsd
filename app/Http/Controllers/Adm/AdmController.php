<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;

class AdmController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-panel');
    }

    public function index()
    {
        return view('adm.index');
    }
}
