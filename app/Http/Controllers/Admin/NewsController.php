<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\News;
use App\Http\Requests\Admin\NewsRequest;

class NewsController extends Controller
{
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    public function index(Request $request)
    {
        $params = $request->query();

        $news = News::select(
            'news.id',
            'news.title',
            'news.created_at',
            'stores.name'
        )
            ->join('stores', 'stores.id', '=', 'news.store_id')
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->serach($params)
            ->orderBy('news.id', 'desc')
            ->paginate(20);

        return view('admin.news.index')->with([
            'news' => $news,
            'params' => $params,
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $this->news->fill($request->validated())->save();
        return redirect('/admin/news')->with('success_message', 'お知らせを追加しました。');
    }

    public function show(Request $request)
    {
        $news = $this->news->findByIdOrFail(Auth::user()->organization_id, $request->id);

        return view('admin.news.show')->with([
            'news' => $news
        ]);
    }

    public function edit(Request $request)
    {
        $news = $this->news->findByIdOrFail(Auth::user()->organization_id, $request->id);

        return view('admin.news.edit')->with([
            'news' => $news
        ]);
    }

    public function update(NewsRequest $request)
    {
        $news = $this->news->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $news->fill($request->all())->save();

        return redirect('/admin/news/show/' . $request->id)->with('success_message', 'お知らせを編集しました。');
    }

    public function delete(Request $request)
    {
        $news = $this->news->findByIdOrFail(Auth::user()->organization_id, $request->id);
        $news->delete();

        return redirect('/admin/news')->with('success_message', 'お知らせを削除しました。');
    }
}
