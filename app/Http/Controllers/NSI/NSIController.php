<?php

namespace App\Http\Controllers\NSI;

use App\Http\Controllers\Controller;

class NSIController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:nsi-panel');
    }

    public function index()
    {
        return view('nsi.index');
    }
}
