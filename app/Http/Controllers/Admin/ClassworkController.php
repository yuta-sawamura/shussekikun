<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function create()
    {
        return view('admin.classwork.create');
    }

    public function store(ClassworkRequest $request)
    {
        $request['organization_id'] = Auth::user()->organization_id;
        $this->classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを追加しました。');
    }

    public function edit(Classwork $classwork)
    {
        return view('admin.classwork.edit')->with([
            'classwork' => $classwork
        ]);
    }

    public function update(Classwork $classwork, ClassworkRequest $request)
    {
        $classwork->fill($request->all())->save();

        return redirect('/admin/class')->with('success_message', 'クラスを編集しました。');
    }

    public function delete(Classwork $classwork)
    {
        $classwork->delete();

        return redirect('/admin/class')->with('success_message', 'クラスを削除しました。');
    }
}
