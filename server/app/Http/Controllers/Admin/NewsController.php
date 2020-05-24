<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index ()
    {
        return view('admin.news.index');
    }

    public function create ()
    {
        return view('admin.news.create');
    }

    public function show ()
    {
        return view('admin.news.show');
    }

    public function edit ()
    {
        return view('admin.news.edit');
    }
}
