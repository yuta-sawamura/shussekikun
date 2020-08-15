<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Store;
use App\Models\Classwork;
use App\Models\Attendance;
use App\Enums\Day;
use Carbon\Carbon;
use DB;

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

    /**
     * 開始時間~終了時間
     * @return stiring
     */
    public function getTimeAttribute()
    {
        return "{$this->start_at}~{$this->end_at}";
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function classwork()
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

    /**
     * スケジュール取得関数
     * @param int
     * @param int
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByIdOrFail(int $organizationId, int $scheduleId)
    {
        return $this->select(
            'schedules.id',
            'schedules.store_id',
            'schedules.classwork_id',
            'schedules.day',
            'schedules.start_at',
            'schedules.end_at',
            'stores.organization_id',
            'stores.name'
        )
            ->join('stores', 'stores.id', '=', 'schedules.store_id')
            ->where('schedules.id', $scheduleId)
            ->where('stores.organization_id', $organizationId)
            ->firstOrFail();
    }

    /**
     * スケジュール・クラス取得関数
     * @param int
     * @return Illuminate\Support\Collection
     */
    public function findByIdScheduleClass(int $storeId)
    {
        return $this->select(
            'schedules.day',
            'schedules.id',
            DB::Raw("CONCAT(classworks.name, ' ', TIME_FORMAT(schedules.start_at, '%H:%i'), '~', TIME_FORMAT(schedules.end_at, '%H:%i')) as name")
        )
            ->join('classworks', 'classworks.id', '=', 'schedules.classwork_id')
            ->where('schedules.store_id', $storeId)
            ->orderBy('schedules.start_at')
            ->get()
            ->groupBy(function ($schedule) {
                $days = [
                    '日曜日' => 1,
                    '月曜日' => 2,
                    '火曜日' => 3,
                    '水曜日' => 4,
                    '木曜日' => 5,
                    '金曜日' => 6,
                    '土曜日' => 7
                ];
                return array_search($schedule['day'], $days);
            })
            ->map(function ($items, $key) {
                return $items->groupBy('id')->map(function ($item) {
                    return $item->pluck('name')->first();
                });
            });
    }
}
