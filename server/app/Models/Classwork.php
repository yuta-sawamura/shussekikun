<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerachKeyword($query, $keyword = null)
    {
        if ($keyword) {
            $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    /**
     * クラス取得関数
     * @param
     * @param
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByIdOrFail($classworkId, $organizationId)
    {
        return $this->where('organization_id', $organizationId)
            ->where('id', $classworkId)
            ->firstOrFail();
    }
}
