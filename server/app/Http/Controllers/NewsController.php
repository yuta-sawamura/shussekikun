<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index ()
    {
        return view('news.index');
    }

    public function show ()
    {
        return view('news.show');
    }
}
