<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->query();

        $news = News::select(
            'news.id',
            'news.store_id',
            'news.title',
            'news.content',
            'news.created_at',
            'news.updated_at',
            'stores.organization_id',
            'stores.name'
        )
            ->join('stores', 'stores.id', '=', 'news.store_id')
            ->where('stores.id', Auth::user()->store_id)
            ->serach($params)
            ->orderBy('news.id', 'desc')
            ->paginate(config('const.PAGINATION_PER_PAGE'));

        return view('news.index')->with([
            'news' => $news,
            'params' => $params,
        ]);
    }

    public function show(Request $request)
    {
        $news = News::select(
            'news.id',
            'news.store_id',
            'news.title',
            'news.content',
            'news.created_at'
        )
            ->join('stores', 'stores.id', '=', 'news.store_id')
            ->where('news.id', $request->id)
            ->where('stores.id', Auth::user()->store_id)
            ->firstOrFail();

        return view('news.show')->with([
            'news' => $news
        ]);
    }
}
