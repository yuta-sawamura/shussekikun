<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class Gender extends Enum
{
    const Man = 1;
    const Woman = 2;
    const List = [
        self::Man => '男',
        self::Woman => '女',
    ];

    public static function getDescription($value): string
    {
        switch ($value){
            case self::Man:
                return '男';
                brake;
            case self::Woman:
                return '女';
                brake;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key){
            case '男':
                return 1;
            case '女':
                return 2;
            default:
                return self::getValue($key);
        }
    }
}
