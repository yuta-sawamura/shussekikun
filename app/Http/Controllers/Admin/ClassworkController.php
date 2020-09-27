<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Classwork;
use App\Http\Requests\Admin\ClassworkRequest;

class ClassworkController extends Controller
{
    public function __construct(Classwork $classwork)
    {
        $this->classwork = $classwork;
    }

    public function index()
    {
        $classworks = Classwork::where('organization_id', Auth::user()->organization_id)
            ->orderBy('id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('admin.classwork.index')->with([
            'classworks' => $classworks,
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.classwork.create');
    }

    public function store(ClassworkRequest $request)
    {
        $request['organization_id'] = Auth::user()->organization_id;
        $this->classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを追加しました。');
    }

    public function edit(Request $request)
    {
        return view('admin.classwork.edit')->with([
            'class' => $this->classwork->findByIdOrFail($request->id, Auth::user()->organization_id),
        ]);
    }

    public function update(ClassworkRequest $request)
    {
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
