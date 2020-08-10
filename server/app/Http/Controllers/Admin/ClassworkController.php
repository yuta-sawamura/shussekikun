<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Auth;
use App\Models\Classwork;
use Validator;

class ClassworkController extends Controller
{
    public function __construct(Classwork $classwork)
    {
        $this->classwork = $classwork;
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $classworks = Classwork::where('organization_id', Auth::user()->organization_id)
            ->serachKeyword($params['keyword'] ?? null)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.classwork.index')->with([
            'classworks' => $classworks,
            'params' => $params,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('classworks')->where(function ($query) use ($request) {
                    return $query->where('organization_id', Auth::user()->organization_id)
                        ->where('name', $request['name']);
                }),
            ]
        ]);
        if ($validator->fails()) {
            return redirect('/admin/class')->with('error_message', 'クラスを追加できませんでした。');
        }

        $request['organization_id'] = Auth::user()->organization_id;
        $this->classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを追加しました。');
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('classworks')->ignore($request['id'])->where(function ($query) use ($request) {
                    return $query->where('organization_id', Auth::user()->organization_id)
                        ->where('name', $request['name']);
                }),
            ]
        ]);
        if ($validator->fails()) {
            return redirect('/admin/class')->with('error_message', 'クラスを編集できませんでした。');
        }

        $classwork = $this->classwork->findByIdOrFail($request->id, Auth::user()->organization_id);
        $classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを編集しました。');
    }

    public function delete(Request $request)
    {
        $classwork = $this->classwork->findByIdOrFail($request->id, Auth::user()->organization_id);
        $classwork->delete();

        return redirect('/admin/class')->with('success_message', 'クラスを削除しました。');
    }
}
