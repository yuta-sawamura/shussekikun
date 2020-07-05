<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\News;
use Validator;

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

    public function create ()
    {
        return view('admin.news.create');
    }

    public function show ()
    {
        return view('admin.news.show');
    }

    public function edit ()
    {
        return view('admin.news.edit');
    }
}
