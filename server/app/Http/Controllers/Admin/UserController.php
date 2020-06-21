<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Models\Store;
use App\Models\Category;
use App\Models\Organization;
use Auth;
use App\Enums\User\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;

class UserController extends Controller
{
    public function aggregate ()
    {
        return view('admin.user.aggregate');
    }

    public function index (Request $request)
    {
        $params = $request->query();

        $users = User::where('organization_id', Auth::user()->organization_id)
            ->where('role', Role::Normal)
            ->store($params['store'] ?? null)
            ->orderBy('id', 'desc')
            ->paginate(20);

        $stores = Store::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id');

        return view('admin.user.index')->with([
            'users' => $users,
            'stores' => $stores,
            'params' => $params,
        ]);
    }

    public function create (Request $request)
    {
        $stores = Store::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id');
        $categories = Category::where('organization_id', Auth::user()->organization_id)->pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');

        return view('admin.user.create')->with([
            'stores' => $stores,
            'categories' => $categories,
            'organizations' => $organizations
        ]);
    }

    public function store (UserRequest $request)
    {
        $user = new User;
        $user->fill($request->validated())->save();
        return redirect('/admin/user/index')->with('success_message', '会員を追加しました。');
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
