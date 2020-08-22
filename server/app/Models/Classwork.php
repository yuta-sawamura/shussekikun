<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Classwork extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'organization_id',
    ];

    /**
     * キーワード検索
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string|null
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerachKeyword(Builder $query, string $keyword = null): Builder
    {
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    /**
     * クラス取得関数
     * @param int
     * @param int
     * @return App\Models\Classwork|\Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByIdOrFail(int $classworkId, int $organizationId)
    {
        return $this->where('organization_id', $organizationId)
            ->where('id', $classworkId)
            ->firstOrFail();
    }
}
