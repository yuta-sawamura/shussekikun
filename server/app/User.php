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
        'name', 'email', 'password',
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

    const GENDER_MAN = 1;
    const GENDER_WOMAN = 2;
    const GENDER_LIST = [
        slef::GENDER_MAN => '男',
        slef::GENDER_WOMAN => '女',
    ];

    const ROLE_ORGANIZATION_ADMIN = 3;
    const ROLE_SHARE = 5;
    const ROLE_LIST = [
        slef::ROLE_ORGANIZATION_ADMIN => '組織管理者',
        slef::ROLE_SHARE => '共有アカウント',
    ];

    const STATUS_CONTINUE = 1;
    const STATUS_CANCEL = 2;
    const STATUS_LISt = [
        self::STATUS_CONTINUE => '継続',
        self::STATUS_CANCEL => '退会',
    ];

}
