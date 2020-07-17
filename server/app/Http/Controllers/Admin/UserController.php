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
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index (Request $request)
    {
        $params = $request->query();

        $users = User::where('organization_id', Auth::user()->organization_id)
            ->where('role', '!=', Role::System)
            ->serachKeyword($params['keyword'] ?? null)
            ->storeFilter($params['store'] ?? null)
            ->categoryFilter($params['category'] ?? null)
            ->genderFilter($params['gender'] ?? null)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.user.index')->with([
            'users' => $users,
            'params' => $params,
        ]);
    }

    public function create (Request $request)
    {
        return view('admin.user.create');
    }

    public function store (UserRequest $request)
    {
        $this->user->fill($request->validated())->save();
        return redirect('/admin/user')->with('success_message', '会員を追加しました。');
    }

    public function show (Request $request)
    {
        $user = $this->user->findByIdOrFail(Auth::user()->organization_id, $request->id);

        return view('admin.user.show')->with([
            'user' => $user
        ]);
    }

    public function edit (Request $request)
    {
        $user = $this->user->findByIdOrFail(Auth::user()->organization_id, $request->id);

        return view('admin.user.edit')->with([
            'user' => $user
        ]);
    }

    public function update (UserRequest $request)
    {
        $user = $this->user->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $user->fill($request->validated())->save();

        return redirect('/admin/user/show/' . $request->id)->with('success_message', '会員情報を編集しました。');
    }

    public function delete (Request $request)
    {
        $user = $this->user->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $user->delete();

        return redirect('/admin/user')->with('success_message', '会員を削除しました。');
    }
}
