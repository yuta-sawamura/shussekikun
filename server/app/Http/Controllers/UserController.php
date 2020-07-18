<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Store;
use App\Models\Category;
use App\Models\Organization;
use Auth;
use App\Enums\User\Role;

class UserController extends Controller
{
    public function index (Request $request)
    {
        $params = $request->query();

        $users = User::where('store_id', Auth::user()->store_id)
            ->where('role', Role::Normal)
            ->serachKeyword($params['keyword'] ?? null)
            ->storeFilter($params['store'] ?? null)
            ->categoryFilter($params['category'] ?? null)
            ->genderFilter($params['gender'] ?? null)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('user.index')->with([
            'users' => $users,
            'params' => $params,
        ]);
    }

    public function show (Request $request)
    {
        $user = User::where('id', $request->id)
            ->where('role', Role::Normal)
            ->where('store_id', Auth::user()->store_id)
            ->firstOrFail();

        return view('user.show')->with([
            'user' => $user
        ]);
    }

    public function rank ()
    {
        return view('user.rank');
    }
}
