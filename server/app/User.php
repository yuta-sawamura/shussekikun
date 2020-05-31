<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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
        'mail',
        'birth',
        'role',
        'password',
        'status'
    ];

    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;
    const GENDER_LIST = [
        self::GENDER_MAN => '男',
        self::GENDER_WOMAN => '女',
    ];

    const ROLE_ORGANIZATION_ADMIN = 3;
    const ROLE_SHARE = 5;
    const ROLE_LIST = [
        self::ROLE_ORGANIZATION_ADMIN => '組織管理者',
        self::ROLE_SHARE => '共有アカウント',
    ];

    const STATUS_CONTINUE = 1;
    const STATUS_CANCEL = 2;
    const STATUS_LISt = [
        self::STATUS_CONTINUE => '継続',
        self::STATUS_CANCEL => '退会',
    ];

    protected $attributes = [
        'status' => self::STATUS_CONTINUE,
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
}
