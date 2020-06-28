<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
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

        $category = new Category;
        $request['organization_id'] = Auth::user()->organization_id;
        $category->fill($request->all())->save();

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

        $category = Category::where('organization_id', Auth::user()->organization_id)
            ->where('id', $request->id)
            ->firstOrFail();
        $category->fill($request->all())->save();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを編集しました。');
    }

    public function delete (Request $request)
    {
        $category = Category::where('organization_id', Auth::user()->organization_id)
            ->where('id', $request->id)
            ->firstOrFail();
        $category->delete();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを削除しました。');
    }
}
