<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Category extends Model
{
    public function scopeOrganization($query)
    {
        return $query->where('organization_id', Auth::user()->organization_id);
    }
}
