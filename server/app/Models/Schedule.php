<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'store_id',
        'classwork_id',
        'day',
        'start_at',
        'end_at',
    ];

    Public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
