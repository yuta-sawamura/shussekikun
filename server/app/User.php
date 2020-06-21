<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Store;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

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

    protected $attributes = [
        'status' => \App\Enums\User\Status::Continue,
    ];

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

    public function getFullNameAttribute()
    {
        return "{$this->sei} {$this->mei}";
    }

    public function getFullNameKanaAttribute()
    {
        return "{$this->sei_kana} {$this->mei_kana}";
    }

    public function getS3Url()
    {
        return $this->img ? Storage::disk('s3')->url($this->img): asset('/img/no-image.jpg');
    }

    public function scopeOrganization($query)
    {
        return $query->where('organization_id', Auth::user()->organization_id);
    }

    public function scopeStoreFilter($query, $id = null)
    {
        if ($id) return $query->where('store_id', $id);
    }

    public function scopeCategoryFilter($query, $id = null)
    {
        if ($id) return $query->where('category_id', $id);
    }

    public function scopeGenderFilter($query, $id = null)
    {
        if ($id) return $query->where('gender', $id);
    }
}
