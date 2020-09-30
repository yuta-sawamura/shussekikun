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
            'news.updated_at',
            'stores.name'
        )
            ->join('stores', 'stores.id', '=', 'news.store_id')
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->serach($params)
            ->orderBy('news.updated_at', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('admin.news.index')->with([
            'news' => $news,
            'params' => $params,
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(NewsRequest $request)
    {
        $this->news->fill($request->validated())->save();
        return redirect('/admin/news')->with('success_message', 'お知らせを追加しました。');
    }

    public function show(News $news)
    {
        return view('admin.news.show')->with([
            'news' => $news
        ]);
    }

    public function edit(News $news)
    {
        return view('admin.news.edit')->with([
            'news' => $news
        ]);
    }

    public function update(News $news, NewsRequest $request)
    {
        $news->fill($request->all())->save();

        return redirect('/admin/news/show/' . $news->id)->with('success_message', 'お知らせを編集しました。');
    }

    public function delete(News $news)
    {
        $news->delete();

        return redirect('/admin/news')->with('success_message', 'お知らせを削除しました。');
    }
}
