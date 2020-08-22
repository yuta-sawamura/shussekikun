<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Store;
use App\Models\Category;
use App\Models\Attendance;
use Illuminate\Support\Facades\Storage;
use App\Enums\User\Role;
use App\Enums\User\Gender;
use App\Enums\User\Status;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organization_id',
        'store_id',
        'category_id',
        'sei',
        'mei',
        'sei_kana',
        'mei_kana',
        'img',
        'gender',
        'email',
        'birth',
        'role',
        'password',
        'status'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 性・名のフルネーム
     * @return stiring
     */
    public function getFullNameAttribute()
    {
        return "{$this->sei} {$this->mei}";
    }

    /**
     * セイ・メイのフルネーム
     * @return stiring
     */
    public function getFullNameKanaAttribute()
    {
        return "{$this->sei_kana} {$this->mei_kana}";
    }

    /**
     * S3のファイルURL取得
     * @return stiring
     */
    public function getS3UrlAttribute()
    {
        return $this->img ? Storage::disk('s3')->url($this->img) : asset('/img/no-image.jpg');
    }

    /**
     * 権限
     * @return stiring
     */
    public function getRoleNameAttribute()
    {
        return Role::getDescription($this->role);
    }

    /**
     * 性別
     * @return stiring
     */
    public function getGenderNameAttribute()
    {
        return Gender::getDescription($this->gender);
    }

    /**
     * 状態
     * @return stiring
     */
    public function getStatusNameAttribute()
    {
        return Status::getDescription($this->status);
    }

    /**
     * 採番関数
     * @param Illuminate\Database\Eloquent\Collection
     * @return array
     */
    public function getNumbering(Collection $users): array
    {
        $rank = 1;
        foreach ($users as $key => $user) {
            // 1つ目の要素
            if ($key === 0) {
                $user['rank'] = $rank;
            } else {
                // 1つ前の要素と比較
                if ($users[$key - 1]['attendance_count'] === $user['attendance_count']) {
                    $user['rank'] = $users[$key - 1]['rank'];
                } else {
                    $user['rank'] = $rank;
                }
            }
            $title[] = $user['rank'] . '位 ' . $user['sei'] . ' ' . $user['mei'];
            $count[] = $user['attendance_count'];
            $rank++;
        }
        return ['title' => $title, 'count' => $count];
    }

    /**
     * 店舗絞り込み
     * @param \Illuminate\Database\Eloquent\Builder
     * @param int|null
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function scopeStoreFilter(Builder $query, int $id = null)
    {
        if ($id) return $query->where('store_id', $id);
    }

    /**
     * カテゴリー絞り込み
     * @param \Illuminate\Database\Eloquent\Builder
     * @param int|null
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function scopeCategoryFilter(Builder $query, int $id = null)
    {
        if ($id) return $query->where('category_id', $id);
    }

    /**
     * 性別絞り込み
     * @param \Illuminate\Database\Eloquent\Builder
     * @param int|null
     * @return \Illuminate\Database\Eloquent\Builder|null
     */
    public function scopeGenderFilter(Builder $query, int $id = null)
    {
        if ($id) return $query->where('gender', $id);
    }

    /**
     * キーワード検索
     * @param \Illuminate\Database\Eloquent\Builder
     * @param string|null
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSerachKeyword(Builder $query, string $keyword = null): Builder
    {
        if ($keyword) {
            $query
                ->where('sei', 'like', '%' . $keyword . '%')
                ->orWhere('mei', 'like', '%' . $keyword . '%')
                ->orWhere('sei_kana', 'like', '%' . $keyword . '%')
                ->orWhere('mei_kana', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    /**
     * 権限・店舗・状態絞り込み
     * @param \Illuminate\Database\Eloquent\Builder
     * @param int
     * @param int
     * @param int
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRoleStoreStatusFilter(Builder $query, int $roleId, int $storeId, int $statusId): Builder
    {
        return $query->where('users.role', $roleId)
            ->where('users.store_id', $storeId)
            ->where('status', '!=', $statusId);
    }

    /**
     * 会員取得関数
     * @param int
     * @param int
     * @return App\User
     */
    public function findByIdOrFail(int $organizationId, int $userId): User
    {
        return $this->where('id', $userId)
            ->where('role', '!=', Role::System)
            ->where('organization_id', $organizationId)
            ->firstOrFail();
    }
}
