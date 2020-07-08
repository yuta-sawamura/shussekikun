<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index ()
    {
        $categories = Category::where('organization_id', Auth::user()->organization_id)
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('admin.category.index')->with([
            'categories' => $categories,
        ]);
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/category')->with('error_message', 'カテゴリーを追加できませんでした。');
        }

        $request['organization_id'] = Auth::user()->organization_id;
        $this->category->fill($request->all())->save();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを追加しました。');
    }

    public function update (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
        ]);
        if ($validator->fails()) {
            return redirect('/admin/category')->with('error_message', 'カテゴリーを編集できませんでした。');
        }

        $category = $this->category->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $category->fill($request->all())->save();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを編集しました。');
    }

    public function delete (Request $request)
    {
        $category = $this->category->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $category->delete();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを削除しました。');
    }
}
