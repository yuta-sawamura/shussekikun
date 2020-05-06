<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index ()
    {
        return view('user.index');
    }

    public function show ()
    {
        return view('user.show');
    }

    public function rank ()
    {
        return view('user.rank');
    }
}
