<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
     * カテゴリー取得関数
     * @param int
     * @param int
     * @return App\Models\Category|\Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function findByIdOrFail(int $organizationId, int $categoryId)
    {
        return $this->where('organization_id', $organizationId)
            ->where('id', $categoryId)
            ->firstOrFail();
    }
}
