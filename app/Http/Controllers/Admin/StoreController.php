<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Store;
use App\Http\Requests\Admin\StoreRequest;

class StoreController extends Controller
{
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function index()
    {
        $stores = Store::where('organization_id', Auth::user()->organization_id)
            ->orderBy('id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('admin.store.index')->with([
            'stores' => $stores,
        ]);
    }

    public function store(StoreRequest $request)
    {
        $request['organization_id'] = Auth::user()->organization_id;
        $this->store->fill($request->all())->save();

        return redirect('/admin/store')->with('success_message', '店舗を追加しました。');
    }

    public function update(StoreRequest $request)
    {
        $store = $this->store->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $store->fill($request->all())->save();

        return redirect('/admin/store')->with('success_message', '店舗を編集しました。');
    }

    public function delete(Request $request)
    {
        $store = $this->store->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $store->delete();

        return redirect('/admin/store')->with('success_message', '店舗を削除しました。');
    }
}
