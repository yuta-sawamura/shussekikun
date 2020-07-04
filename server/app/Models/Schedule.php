<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\Classwork;
use App\Enums\Day;
use Carbon\Carbon;

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

    Public function classwork()
    {
        return $this->belongsTo(Classwork::class)->select('classworks.name as classwork_name');
    }

    /**
     * 開始時間
     * @return stiring
     */
    public function getStartAtAttribute($value)
    {
        return Carbon::parse($value)->format("H:i");
    }

    /**
     * 終了時間
     * @return stiring
     */
    public function getEndAtAttribute($value)
    {
        return Carbon::parse($value)->format("H:i");
    }

    /**
     * 曜日
     * @return stiring
     */
    public function getDayNameAttribute()
    {
        return Day::getDescription($this->day);
    }

    /**
     * 店舗絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeStoreFilter($query, $id = null)
    {
        if ($id) return $query->where('schedules.store_id', $id);
    }

    /**
     * クラス絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeClassworkFilter($query, $id = null)
    {
        if ($id) return $query->where('schedules.classwork_id', $id);
    }

    /**
     * 曜日絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDayFilter($query, $id = null)
    {
        if ($id) return $query->where('schedules.day', $id);
    }
}
