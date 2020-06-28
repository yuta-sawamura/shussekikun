<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Store;
use Validator;

class StoreController extends Controller
{
    public function index ()
    {
        $stores = Store::where('organization_id', Auth::user()->organization_id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.store.index')->with([
            'stores' => $stores,
        ]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/store')->with('error_message', '店舗を追加できませんでした。');
        }

        $store = new Store;
        $request['organization_id'] = Auth::user()->organization_id;
        $store->fill($request->all())->save();

        return redirect('/admin/store')->with('success_message', '店舗を追加しました。');
    }

    public function update (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/store')->with('error_message', '店舗を編集できませんでした。');
        }

        $store = Store::where('organization_id', Auth::user()->organization_id)
            ->where('id', $request->id)
            ->firstOrFail();
        $store->fill($request->all())->save();

        return redirect('/admin/store')->with('success_message', '店舗を編集しました。');
    }

    public function delete (Request $request)
    {
        $store = Store::where('organization_id', Auth::user()->organization_id)
            ->where('id', $request->id)
            ->firstOrFail();
        $store->delete();

        return redirect('/admin/store')->with('success_message', '店舗を削除しました。');
    }
}
