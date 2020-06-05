<?php

namespace App\Enums\User;

use BenSampo\Enum\Enum;

final class Status extends Enum
{
    const Continue = 1;
    const Cancel = 2;
    const List = [
        self::Continue => '継続',
        self::Cancel => '退会',
    ];

    public static function getDescription($value): string
    {
        switch ($value){
            case self::Continue:
                return '継続';
                brake;
            case self::Cancel:
                return '退会';
                brake;
            default:
                return self::getKey($value);
        }
    }

    public static function getValue(string $key)
    {
        switch ($key){
            case '継続':
                return 1;
            case '退会':
                return 3;
            default:
                return self::getValue($key);
        }
    }
}
