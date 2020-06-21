<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Category extends Model
{
    /**
     * 組織絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrganization($query)
    {
        return $query->where('organization_id', Auth::user()->organization_id);
    }
}
