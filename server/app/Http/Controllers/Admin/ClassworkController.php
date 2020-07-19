<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Classwork;
use Validator;

class ClassworkController extends Controller
{
    public function __construct(Classwork $classwork)
    {
        $this->classwork = $classwork;
    }

    public function index (Request $request)
    {
        $params = $request->query();

        $classworks = Classwork::select('classworks.id', 'classworks.name', 'classworks.store_id', 'stores.organization_id', 'stores.name as store_name')
            ->join('stores', 'stores.id', '=', 'classworks.store_id')
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->serachKeyword($params['keyword'] ?? null)
            ->storeFilter($params['store'] ?? null)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.classwork.index')->with([
            'classworks' => $classworks,
            'params' => $params,
        ]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|integer',
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/class')->with('error_message', 'クラスを追加できませんでした。');
        }
        $this->classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを追加しました。');
    }

    public function update (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'store_id' => 'required|integer',
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/class')->with('error_message', 'クラスを編集できませんでした。');
        }

        $classwork = $this->classwork->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを編集しました。');
    }

    public function delete (Request $request)
    {
        $classwork = $this->classwork->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $classwork->delete();

        return redirect('/admin/class')->with('success_message', 'クラスを削除しました。');
    }
}
