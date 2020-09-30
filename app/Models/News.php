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
     * このお知らせを所有する店舗を取得
     */
    public function store()
    {
        return $this->belongsTo('App\Models\Store');
    }

    /**
     * 検索・絞り込み
     * @param \Illuminate\Database\Eloquent\Builder
     * @param array
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerach(Builder $query, array $params): Builder
    {
        // 店舗絞り込み
        if (!empty($params['store'])) $query->where('store_id', $params['store']);

        // キーワード検索
        if (!empty($params['keyword'])) {
            $query->where(function ($query) use ($params) {
                $query->where('news.title', 'like', '%' . $params['keyword'] . '%')
                    ->orWhere('news.content', 'like', '%' . $params['keyword'] . '%');
            });
        }

        return $query;
    }

    /**
     * パース
     */
    private function parse()
    {
        $parser = new Markdown();
        return new HtmlString($parser->parse($this->content));
    }

    public function getMarkContentAttribute()
    {
        return $this->parse();
    }
}
