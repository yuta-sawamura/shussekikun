<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
     * キーワード検索
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerachKeyword($query, $keyword = null)
    {
        if ($keyword) {
            $query->where('news.title', 'like', '%' . $keyword . '%');
            $query->orWhere('news.content', 'like', '%' . $keyword . '%');
            $query->orWhere('stores.name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    /**
     * 店舗絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStoreFilter($query, $id = null)
    {
        if ($id) return $query->where('store_id', $id);
    }

    /**
     * パース
     */
    public function parse() {
        $parser = new Markdown();
        return new HtmlString($parser->parse($this->content));
    }

    public function getMarkContentAttribute() {
        return $this->parse();
    }

    /**
     * お知らせ取得関数
     * @param int
     * @param int
     * @return \Illuminate\Database\Eloquent\Builder
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
