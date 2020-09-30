<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Models\Category;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = Category::where('organization_id', Auth::user()->organization_id)
            ->orderBy('id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('admin.category.index')->with([
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $request['organization_id'] = Auth::user()->organization_id;
        $this->category->fill($request->all())->save();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを追加しました。');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit')->with([
            'category' => $category
        ]);
    }

    public function update(Category $category, CategoryRequest $request)
    {
        $category->fill($request->all())->save();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを編集しました。');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect('/admin/category')->with('success_message', 'カテゴリーを削除しました。');
    }
}
