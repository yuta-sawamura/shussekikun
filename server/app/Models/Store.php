<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'organization_id'
    ];

    /**
     * 店舗取得関数
     * @param int
     * @param int
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByIdOrFail(int $organizationId, int $storeId)
    {
        return $this->where('organization_id', $organizationId)
            ->where('id', $storeId)
            ->firstOrFail();
    }
}
