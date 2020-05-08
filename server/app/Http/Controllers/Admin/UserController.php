<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function aggregate ()
    {
        return view('admin.user.aggregate');
    }

    public function index ()
    {
        return view('admin.user.index');
    }

    public function add ()
    {
        return view('admin.user.add');
    }

    public function show ()
    {
        return view('admin.user.show');
    }

    public function edit ()
    {
        return view('admin.user.edit');
    }

    public function premium ()
    {
        return view('admin.user.premium');
    }
}
