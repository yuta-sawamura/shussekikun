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
     * 検索
     * @param \Illuminate\Database\Eloquent\Builder
     * @param array
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerach(Builder $query, array $params): Builder
    {
        if (!empty($params['keyword'])) $query->where('name', 'like', '%' . $params['keyword'] . '%');
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
