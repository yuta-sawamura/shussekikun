<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class Role extends Enum
{
    const System = 1;
    const Organization_admin = 3;
    const Share = 5;
    const List_for_System = [
        self::System => 'システム管理者',
        self::Organization_admin => '組織管理者',
        self::Share => '共有アカウント',
    ];
    const List_for_organization_admin = [
        self::Organization_admin => '組織管理者',
        self::Share => '共有アカウント',
    ];

    public static function getDescription($value): string
    {
        switch ($value){
            case self::System:
                return 'システム管理者';
                brake;
            case self::Organization_admin:
                return '組織管理者';
                brake;
            case self::Share:
                return '共有アカウント';
                brake;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key){
            case 'システム管理者':
                return 1;
            case '組織管理者':
                return 3;
            case '共有アカウント':
                return 5;
            default:
                return self::getValue($key);
        }
    }
}
