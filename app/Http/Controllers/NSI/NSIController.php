<?php

namespace App\Http\Controllers\NSI;

use App\Http\Controllers\Controller;

class NSIController extends Controller
{
    public function index()
    {
        return view('nsi.index');
    }
}
