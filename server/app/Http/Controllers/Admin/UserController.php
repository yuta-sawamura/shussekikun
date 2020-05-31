<?php

namespace App\Http\Controllers\Admin;

use App\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function create (Request $request)
    {
        return view('admin.user.create');
    }

    public function store (Request $request)
    {
        $user = new User;
        $request['organization_id'] = 1; // ログイン機能を実装したら書き換える
        $request['password'] = Hash::make($request->password);
        $form = $request->all();
        $user->fill($form)->save();
        return redirect('/admin/user/index')->with('message', '会員を追加しました。');
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
