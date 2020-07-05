<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\News;
use App\Http\Requests\Admin\NewsRequest;

class NewsController extends Controller
{
    public function index (Request $request)
    {
        $params = $request->query();

        $news = News::select(
                'news.id',
                'news.store_id',
                'news.title',
                'news.content',
                'news.created_at',
                'stores.organization_id',
                'stores.name'
            )
            ->join('stores','stores.id','=','news.store_id')
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->serachKeyword($params['keyword'] ?? null)
            ->storeFilter($params['store'] ?? null)
            ->orderBy('news.id', 'desc')
            ->paginate(20);

        return view('admin.news.index')->with([
            'news' => $news,
            'params' => $params,
        ]);
    }

    public function create (Request $request)
    {
        return view('admin.news.create');
    }

    public function store (NewsRequest $request)
    {
        $news = new News;
        $news->fill($request->validated())->save();
        return redirect('/admin/news')->with('success_message', 'お知らせを追加しました。');
    }

    public function show (Request $request)
    {
        $news = News::select(
                'news.id',
                'news.store_id',
                'news.title',
                'news.content',
                'news.created_at',
                'stores.organization_id',
                'stores.name'
            )
            ->join('stores','stores.id','=','news.store_id')
            ->where('news.id', $request->id)
            ->where('stores.organization_id', Auth::user()->organization_id)
            ->firstOrFail();

        return view('admin.news.show')->with([
            'news' => $news
        ]);
    }

    public function edit ()
    {
        return view('admin.news.edit');
    }
}
