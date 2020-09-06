<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use cebe\markdown\Markdown;
use Illuminate\Support\HtmlString;

class News extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'title',
        'content',
    ];

    /**
     * 検索・絞り込み
     * @param \Illuminate\Database\Eloquent\Builder
     * @param array
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerach(Builder $query, array $params): Builder
    {
        // キーワード検索
        if (!empty($params['keyword'])) {
            $query->where('news.title', 'like', '%' . $params['keyword'] . '%')
                ->orWhere('news.content', 'like', '%' . $params['keyword'] . '%')
                ->orWhere('stores.name', 'like', '%' . $params['keyword'] . '%');
        }

        // 店舗絞り込み
        if (!empty($params['store'])) $query->where('store_id', $params['store']);

        return $query;
    }

    /**
     * パース
     */
    public function parse()
    {
        $parser = new Markdown();
        return new HtmlString($parser->parse($this->content));
    }

    public function getMarkContentAttribute()
    {
        return $this->parse();
    }

    /**
     * お知らせ取得関数
     * @param int
     * @param int
     * @return App\Models\News|\Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByIdOrFail(int $organizationId, int $newsId)
    {
        return $this->select(
            'news.id',
            'news.store_id',
            'news.title',
            'news.content',
            'news.created_at',
            'stores.organization_id',
            'stores.name'
        )
            ->join('stores', 'stores.id', '=', 'news.store_id')
            ->where('news.id', $newsId)
            ->where('stores.organization_id', $organizationId)
            ->firstOrFail();
    }
}
