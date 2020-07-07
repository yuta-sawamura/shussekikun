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
        'store_id',
    ];

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
     * キーワード検索
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $keyword
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerachKeyword($query, $keyword = null)
    {
        if ($keyword) {
            $query->where('classworks.name', 'like', '%' . $keyword . '%');
            $query->orWhere('stores.name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    /**
     * クラス取得関数
     * @param int
     * @param int
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByIdOrFail(int $organizationId, int $classworkId)
    {
        return $this->select('classworks.id', 'classworks.name', 'classworks.store_id', 'stores.organization_id', 'stores.name as store_name')
            ->join('stores','stores.id','=','classworks.store_id')
            ->where('classworks.id', $classworkId)
            ->where('stores.organization_id', $organizationId)
            ->firstOrFail();
    }
}
