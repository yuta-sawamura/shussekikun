<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use App\Enums\User\Role;
use App\Enums\User\Gender;
use App\Enums\User\Status;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

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

    Public function store()
    {
        return $this->belongsTo(Store::class);
    }

    Public function category()
    {
        return $this->belongsTo(Category::class);
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
        return $this->img ? Storage::disk('s3')->url($this->img): asset('/img/no-image.jpg');
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
     * カテゴリー絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoryFilter($query, $id = null)
    {
        if ($id) return $query->where('category_id', $id);
    }

    /**
     * 性別絞り込み
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int|null $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGenderFilter($query, $id = null)
    {
        if ($id) return $query->where('gender', $id);
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
            $query->where('sei', 'like', '%' . $keyword . '%');
            $query->orWhere('mei', 'like', '%' . $keyword . '%');
            $query->orWhere('sei_kana', 'like', '%' . $keyword . '%');
            $query->orWhere('mei_kana', 'like', '%' . $keyword . '%');
        }
        return $query;
    }

    /**
     * 会員取得関数
     * @param int
     * @param int
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function findByIdOrFail(int $organizationId, int $userId)
    {
        return $this->where('id', $userId)
        ->where('role', '!=', Role::System)
        ->where('organization_id', $organizationId)
        ->firstOrFail();
    }
}
